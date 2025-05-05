const Component_UpdateDynamicAnchors = () => {
	// Selektiere Buttons mit spezifischen href-Attributen
	const anchorSelectors = ["a[href='#bewerben']", "a[href='#learn-more']"];
	const buttons = document.querySelectorAll(anchorSelectors.join(","));

	if (buttons.length === 0) {
		return;
	}

	buttons.forEach((button) => {
		const targetId = button.getAttribute("href"); // Ziel-Anker (#bewerben oder #learn-more)
		const newHref = `${window.location.origin}${window.location.pathname}${targetId}`;

		// Aktualisiere das href-Attribut des Buttons
		button.setAttribute("href", newHref);
	});
};

export default Component_UpdateDynamicAnchors;
