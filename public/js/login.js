const pass = document.getElementById('contraseña'),
                icon = document.querySelector('.eye');

        icon.addEventListener("click", e => {
            if (pass.type === "password"){
                pass.type = "text";
                icon.textContent = 'visibility_off'
            } else {
                pass.type ="password"
                icon.textContent = 'visibility';
            }
        })

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});
