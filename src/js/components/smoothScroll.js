import Lenis from "@studio-freight/lenis";

const Component_SmoothScroll = () => {
	if (typeof Lenis !== "function") {
		document.documentElement.style.overflow = "auto";
		return;
	}

	let lenis;

	try {
		lenis = new Lenis({
			smooth: true,
		});

		function raf(time) {
			lenis.raf(time);
			requestAnimationFrame(raf);
		}
		requestAnimationFrame(raf);
	} catch (error) {
		document.documentElement.style.overflow = "auto";
		document.body.style.overflow = "auto";
	}
};

export default Component_SmoothScroll;
