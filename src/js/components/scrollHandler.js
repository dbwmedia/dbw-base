const Component_ScrollHandler = () => {
	const header = document.querySelector("header");

	if (!header) {
		console.warn("Header element not found");
		return null;
	}

	// Funktion um Header-Klasse basierend auf Scroll-Position zu setzen
	const updateHeaderClass = () => {
		if (window.scrollY > 0) {
			header.classList.add("scroll");
		} else {
			header.classList.remove("scroll");
		}
	};

	// Initial beim Laden ausführen (löst dein Ankerlink-Problem)
	updateHeaderClass();

	// Scroll-Event-Listener hinzufügen
	window.addEventListener("scroll", updateHeaderClass, { passive: true });

	return null;
};

export default Component_ScrollHandler;
