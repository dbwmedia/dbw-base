const Component_ContactPopup = () => {
	document.addEventListener("DOMContentLoaded", function () {
		var popup = document.querySelector(".contact-popup");
		var closeButton = document.querySelector(
			".contact-popup .content-container .close-button"
		);
		var reopenButton = document.querySelector(".reopen-button"); // Stellen Sie sicher, dass dies korrekt zugeordnet ist

		// Funktion zur verzögerten Anzeige abhängig von der Bildschirmbreite
		function delayedDisplay() {
			if (window.innerWidth > 768) {
				// Zeigt das Popup nach einer Sekunde auf Nicht-Mobilgeräten
				setTimeout(function () {
					popup.style.display = "block";
					setTimeout(function () {
						popup.style.opacity = 1;
						popup.style.visibility = "visible";
					}, 10); // Verzögerung für CSS-Transitions
				}, 10000);
			} else {
				// Zeigt nur den Reopen-Button initial an auf Mobilgeräten
				setTimeout(function () {
					reopenButton.style.display = "flex";
					setTimeout(function () {
						reopenButton.style.opacity = 1;
						reopenButton.style.visibility = "visible";
					}, 10); // Verzögerung für CSS-Transitions
				}, 10000);
			}
		}

		delayedDisplay();
		window.addEventListener("resize", delayedDisplay);

		// Event zum Schließen des Popups
		closeButton.addEventListener("click", function () {
			popup.style.opacity = 0;
			popup.style.visibility = "hidden";
			setTimeout(function () {
				popup.style.display = "none";
				reopenButton.style.display = "flex"; // Vorbereiten des Reopen-Buttons zur Anzeige
				setTimeout(function () {
					reopenButton.style.opacity = 1;
					reopenButton.style.visibility = "visible";
				}, 10);
			}, 100);
		});

		// Event zum erneuten Öffnen des Popups beim Klicken auf den Reopen-Button
		reopenButton.addEventListener("click", function () {
			reopenButton.style.opacity = 0;
			reopenButton.style.visibility = "hidden";
			setTimeout(function () {
				reopenButton.style.display = "none";
				popup.style.display = "block";
				setTimeout(function () {
					popup.style.opacity = 1;
					popup.style.visibility = "visible";
				}, 10);
			}, 100);
		});
	});
};

export default Component_ContactPopup;
