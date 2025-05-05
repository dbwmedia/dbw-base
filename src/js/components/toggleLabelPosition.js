const Component_toggleLabelPosition = () => {
	document.addEventListener("DOMContentLoaded", function () {
		const inputs = document.querySelectorAll(
			".form-group input, .form-group textarea"
		);

		inputs.forEach((input) => {
			// Überprüfen, ob bereits Text im Input-Feld vorhanden ist
			if (input.value.trim() !== "") {
				input
					.closest(".form-group")
					.querySelector("label")
					.classList.add("active");
			}

			// Wenn das Eingabefeld den Fokus bekommt
			input.addEventListener("focus", function () {
				this.closest(".form-group")
					.querySelector("label")
					.classList.add("active");
			});

			// Wenn das Eingabefeld den Fokus verliert
			input.addEventListener("blur", function () {
				if (this.value.trim() === "") {
					this.closest(".form-group")
						.querySelector("label")
						.classList.remove("active");
				}
			});
		});
	});
};

export default Component_toggleLabelPosition;
