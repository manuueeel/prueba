document.getElementById("form-reg").addEventListener("submit", function(event) {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let password2 = document.getElementById("password2").value.trim();

    let errorEmail = document.getElementById("error-email");
    let errorContra = document.getElementById("error-contra");
    let errorRepiteContra = document.getElementById("error-repite-contra");

    // Resetear mensajes de error
    errorEmail.textContent = "";
    errorContra.textContent = "";
    errorRepiteContra.textContent = "";

    let hasError = false;

    // Validación del correo
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email === "") {
        errorEmail.textContent = "El correo es obligatorio.";
        hasError = true;
    } else if (!emailPattern.test(email)) {
        errorEmail.textContent = "El correo no tiene un formato válido.";
        hasError = true;
    }

    // Validación de la contraseña
    let passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (password === "") {
        errorContra.textContent = "La contraseña es obligatoria.";
        hasError = true;
    } else if (!passwordPattern.test(password)) {
        errorContra.textContent = "La contraseña debe tener al menos 8 caracteres e incluir letras y números.";
        hasError = true;
    }

    // Validación de la repetición de la contraseña
    if (password2 === "") {
        errorRepiteContra.textContent = "Debes repetir la contraseña.";
        hasError = true;
    } else if (password !== password2) {
        errorRepiteContra.textContent = "Las contraseñas no coinciden.";
        hasError = true;
    }

    if (hasError) {
        event.preventDefault(); // Evita que el formulario se envíe si hay errores
    }
});
