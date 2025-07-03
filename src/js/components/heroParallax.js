/**
 * DBW Apple-Style Parallax Component
 * Separater Transform für Background und Content mit antizyklischer Bewegung
 */
const Component_Parallax = () => {
	// Konfiguration für dramatischen, modernen Effekt
	const CONFIG = {
		// Background: Starke Y-Bewegung + Zoom
		bgSpeed: 0.8, // 80% der Scroll-Geschwindigkeit
		bgMaxMove: 400, // Starke Y-Bewegung nach unten
		bgMaxScale: 0.3, // 30% Zoom beim Scrollen!

		// Content: Gegenläufig + Fade + Scale
		contentSpeed: 0.6, // 60% der Scroll-Geschwindigkeit
		contentMaxMove: 250, // Starke Bewegung nach oben
		contentMaxScale: 0.15, // 15% Scale down (kleiner werden)
		contentOpacity: true, // Fade-out Effekt
		contentOpacityMin: 0.2, // Fast komplett ausblenden

		// Performance
		throttleDelay: 0, // RAF übernimmt Throttling
		smoothness: 0.15, // Smooth aber responsive
	};

	// Suche nach allen dbw-hero-* Elementen
	const heroElements = document.querySelectorAll('[class*="dbw-hero-"]');
	if (heroElements.length === 0) return;

	// Performance checks
	const isMobile = () => window.innerWidth <= 768;
	const prefersReducedMotion = () =>
		window.matchMedia("(prefers-reduced-motion: reduce)").matches;

	// Smooth Lerp Funktion für butterweiche Animation
	const lerp = (start, end, factor) => start + (end - start) * factor;

	// Easing Functions für organischere Bewegung
	const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);
	const easeOutQuad = (t) => t * (2 - t);

	heroElements.forEach((hero) => {
		// Background Element suchen
		const bgElement = hero.querySelector(".dbw-hero-background");
		const heroContent = hero.querySelector(".dbw-hero-content");

		// Check ob Background vorhanden (img oder background-image)
		if (bgElement) {
			const hasImg = bgElement.querySelector("img");
			const hasBgImage =
				window.getComputedStyle(bgElement).backgroundImage !== "none";

			if (hasImg || hasBgImage) {
				hero.classList.add("has-bg-image");
			}
		}

		// Falls alte inline background-image vorhanden, in Background Element verschieben
		const inlineBgImage = hero.style.backgroundImage;
		if (inlineBgImage && bgElement) {
			bgElement.style.backgroundImage = inlineBgImage;
			hero.style.backgroundImage = ""; // Original entfernen
			hero.classList.add("has-bg-image");
		}

		// Skip wenn kein Background oder Mobile/Reduced Motion
		if (!bgElement || isMobile() || prefersReducedMotion()) return;

		// State für smooth animations
		let currentBgY = 0;
		let currentBgScale = 1;
		let currentContentY = 0;
		let currentContentScale = 1;
		let currentContentOpacity = 1;
		let targetBgY = 0;
		let targetBgScale = 1;
		let targetContentY = 0;
		let targetContentScale = 1;
		let targetContentOpacity = 1;
		let ticking = false;

		const updateTransforms = () => {
			const rect = hero.getBoundingClientRect();
			const heroHeight = hero.offsetHeight;
			const windowHeight = window.innerHeight;

			// Berechne Sichtbarkeit und Progress
			const heroTop = rect.top;
			const heroBottom = rect.bottom;

			// Hero ist nur relevant wenn sichtbar oder angeschnitten
			if (heroBottom < 0 || heroTop > windowHeight) {
				ticking = false;
				return;
			}

			// Progress: 0 = Hero top am viewport top, 1 = Hero komplett durchgescrollt
			let scrollProgress = 0;

			if (heroTop <= 0) {
				// Hero ist angeschnitten oder höher
				scrollProgress = Math.min(1, Math.abs(heroTop) / heroHeight);
			}

			// Dramatischer Effekt mit Easing
			const easedProgress = easeOutQuad(scrollProgress);

			// BACKGROUND: Starke Y-Bewegung + ZOOM EFFEKT
			targetBgY = easedProgress * CONFIG.bgMaxMove * CONFIG.bgSpeed;
			targetBgScale = 1 + easedProgress * CONFIG.bgMaxScale; // Zoom in!

			// CONTENT: Gegenläufige Bewegung + Scale Down + Fade
			targetContentY =
				easedProgress * CONFIG.contentMaxMove * CONFIG.contentSpeed * -1;
			targetContentScale = 1 - easedProgress * CONFIG.contentMaxScale; // Scale down!

			// Opacity für dramatischen Fade
			if (CONFIG.contentOpacity) {
				targetContentOpacity =
					1 - easedProgress * (1 - CONFIG.contentOpacityMin);
			}

			// Smooth interpolation für butterweiche Animation
			currentBgY = lerp(currentBgY, targetBgY, CONFIG.smoothness);
			currentBgScale = lerp(currentBgScale, targetBgScale, CONFIG.smoothness);
			currentContentY = lerp(
				currentContentY,
				targetContentY,
				CONFIG.smoothness
			);
			currentContentScale = lerp(
				currentContentScale,
				targetContentScale,
				CONFIG.smoothness
			);
			currentContentOpacity = lerp(
				currentContentOpacity,
				targetContentOpacity,
				CONFIG.smoothness
			);

			// Apply Transforms mit GPU Acceleration
			if (bgElement) {
				// Background mit Y-Movement UND Scale (Zoom)
				bgElement.style.transform = `translate3d(0, ${currentBgY}px, 0) scale(${currentBgScale})`;
			}

			if (heroContent) {
				// Content mit gegenläufiger Bewegung
				heroContent.style.transform = `translate3d(0, ${currentContentY}px, 0) scale(${currentContentScale})`;
				if (CONFIG.contentOpacity) {
					heroContent.style.opacity = currentContentOpacity;
				}
			}

			// Continue animation wenn Differenz vorhanden
			const bgDiff = Math.abs(targetBgY - currentBgY);
			const bgScaleDiff = Math.abs(targetBgScale - currentBgScale);
			const contentDiff = Math.abs(targetContentY - currentContentY);
			const scaleDiff = Math.abs(targetContentScale - currentContentScale);

			if (
				bgDiff > 0.1 ||
				bgScaleDiff > 0.001 ||
				contentDiff > 0.1 ||
				scaleDiff > 0.001
			) {
				requestAnimationFrame(updateTransforms);
			} else {
				ticking = false;
			}
		};

		const onScroll = () => {
			if (!ticking) {
				requestAnimationFrame(updateTransforms);
				ticking = true;
			}
		};

		// Intersection Observer für Performance
		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						window.addEventListener("scroll", onScroll, { passive: true });
						onScroll(); // Initial update
					} else {
						window.removeEventListener("scroll", onScroll);
						ticking = false;
					}
				});
			},
			{ rootMargin: "10% 0px" } // Etwas früher aktivieren für smoothen Start
		);

		observer.observe(hero);

		// Resize Handler
		const handleResize = () => {
			if (isMobile()) {
				// Reset transforms
				if (bgElement) bgElement.style.transform = "";
				if (heroContent) heroContent.style.transform = "";
				window.removeEventListener("scroll", onScroll);
				observer.disconnect();
			}
		};

		window.addEventListener("resize", handleResize);

		// Initial Setup
		if (bgElement) {
			bgElement.style.transformOrigin = "center center";

			// Falls img Element vorhanden, auch darauf transform-origin setzen
			const bgImg = bgElement.querySelector("img");
			if (bgImg) {
				bgImg.style.transformOrigin = "center center";
				bgImg.style.willChange = "transform";
			}
		}
		if (heroContent) {
			heroContent.style.transformOrigin = "center bottom"; // Bottom für natürlichere Scale
		}

		console.log("DBW Apple-Style Parallax: Aktiviert für", hero.className);
	});
};

export default Component_Parallax;
