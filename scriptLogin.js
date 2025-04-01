document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ El script de validación se ha cargado correctamente.");

    const form = document.getElementById("form-ses");
    if (!form) {
        console.error("❌ No se encontró el formulario. Verifica el ID en login.php.");
        return;
    }

    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const emailWarning = document.getElementById("ewarning");
    const passwordWarning = document.getElementById("pwarning");

    form.addEventListener("submit", function (event) {
        console.log("📩 Se ha intentado enviar el formulario.");
        let valid = true;
        
        // Asegurar que los mensajes de error sean visibles
        emailWarning.style.display = "block";
        passwordWarning.style.display = "block";

        // Resetear mensajes de error
        emailWarning.textContent = "";
        emailWarning.style.color = "red";
        passwordWarning.textContent = "";
        passwordWarning.style.color = "red";

        // Validar email
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailValue === "") {
            console.log("⚠️ Error: Email vacío.");
            emailWarning.textContent = "El email es obligatorio.";
            valid = false;
        } else if (!emailRegex.test(emailValue)) {
            console.log("⚠️ Error: Formato de email inválido.");
            emailWarning.textContent = "Formato de email inválido.";
            valid = false;
        }

        // Validar contraseña
        const passwordValue = passwordInput.value.trim();
        if (passwordValue === "") {
            console.log("⚠️ Error: Contraseña vacía.");
            passwordWarning.textContent = "La contraseña es obligatoria.";
            valid = false;
        } else if (passwordValue.length < 6) {
            console.log("⚠️ Error: Contraseña muy corta.");
            passwordWarning.textContent = "La contraseña debe tener al menos 6 caracteres.";
            valid = false;
        }

        
    });
});
