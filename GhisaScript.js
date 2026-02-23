/* ===============================
   GHISA GLOBAL SCRIPT
================================= */

document.addEventListener("DOMContentLoaded", function () {

    /* ===============================
       HERO AUTO SLIDE (backup logic)
    =================================*/
    const slider = document.querySelector(".hero-slider");
    if (slider) {
        let scrollAmount = 0;

        setInterval(() => {
            scrollAmount += 1;
            slider.scrollLeft += 1;

            if (slider.scrollLeft >= slider.scrollWidth / 2) {
                slider.scrollLeft = 0;
            }
        }, 30);
    }

    /* ===============================
       FLOATING LABEL FIX
    =================================*/
    const inputs = document.querySelectorAll(".form-group input, .form-group textarea");

    inputs.forEach(input => {
        input.addEventListener("focus", () => {
            input.parentElement.classList.add("focused");
        });

        input.addEventListener("blur", () => {
            if (input.value === "") {
                input.parentElement.classList.remove("focused");
            }
        });
    });

    /* ===============================
       IMAGE UPLOAD + CAMERA
    =================================*/
    const photoInput = document.getElementById("passportUpload");
    const preview = document.getElementById("photoPreview");

    if (photoInput) {
        photoInput.addEventListener("change", function () {
            const file = this.files[0];

            if (file && preview) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    }

    /* ===============================
       PASSWORD VALIDATION
    =================================*/
    const pass1 = document.getElementById("password1");
    const pass2 = document.getElementById("password2");

    if (pass1 && pass2) {
        pass2.addEventListener("keyup", () => {
            if (pass1.value !== pass2.value) {
                pass2.style.borderColor = "red";
            } else {
                pass2.style.borderColor = "green";
            }
        });
    }

    /* ===============================
       EMAIL CODE AUTO SUBMIT
    =================================*/
    const codeInputs = document.querySelectorAll(".code-input");

    if (codeInputs.length > 0) {
        codeInputs.forEach((input, index) => {
            input.addEventListener("keyup", (e) => {
                if (input.value.length === 1 && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
            });
        });
    }

    /* ===============================
       POPUP MODAL SYSTEM
    =================================*/
    window.showGhisaPopup = function (message) {
        let modal = document.createElement("div");
        modal.className = "ghisa-modal";

        modal.innerHTML = `
            <div class="ghisa-modal-content">
                <p>${message}</p>
                <button onclick="closeGhisaPopup()">OK</button>
            </div>
        `;

        document.body.appendChild(modal);
    };

    window.closeGhisaPopup = function () {
        const modal = document.querySelector(".ghisa-modal");
        if (modal) modal.remove();
    };

});
