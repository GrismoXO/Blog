    document.addEventListener("DOMContentLoaded", function () {
        const registrationForm = document.querySelector("#registration-form");
        const successPopup = document.querySelector("#registration-success-popup");

        registrationForm.addEventListener("submit", function (event) {
            // Empêche l'envoi du formulaire par défaut
            event.preventDefault();

            // Affiche la pop-up
            successPopup.classList.remove("hidden");
        });
    });
