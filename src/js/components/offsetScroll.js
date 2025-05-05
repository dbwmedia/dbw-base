const Component_OffsetScroll = () => {
	console.log("OffsetScroll component initialized");

	const smoothScrollLinks = document.querySelectorAll("a.smooth-scroll");
	console.log(`Found ${smoothScrollLinks.length} smooth-scroll links`);

	smoothScrollLinks.forEach((link) => {
		link.addEventListener("click", function (e) {
			e.preventDefault(); // Verhindert das Standardverhalten von href
			e.stopPropagation(); // Stoppt andere Event-Listener

			console.log("Link clicked:", this);

			// Extrahiere die Ziel-ID (Teil nach dem #)
			const targetID = this.getAttribute("href").split("#")[1];
			console.log("Target ID:", targetID);

			// Suche das Ziel-Element basierend auf der ID
			const targetElement = document.getElementById(targetID);

			if (targetElement) {
				console.log("Target element found:", targetElement);

				// Prüfe und parse den Offset-Wert aus data-offset
				const hasOffset = this.hasAttribute("data-offset");
				const offset = hasOffset ? parseInt(this.dataset.offset, 10) : 0;

				console.log("Offset value (in px):", offset);

				// Berechne die Zielposition
				const elementPosition =
					targetElement.getBoundingClientRect().top + window.scrollY;
				const offsetPosition = elementPosition - offset;

				console.log("Element position:", elementPosition);
				console.log("Offset position:", offsetPosition);

				// Scrolle zur berechneten Position
				window.scrollTo({
					top: offsetPosition,
					behavior: "smooth",
				});

				console.log("Scroll triggered to:", offsetPosition);
			} else {
				console.warn(`Target element not found for ID: ${targetID}`);
			}
		});
	});
};

export default Component_OffsetScroll;
