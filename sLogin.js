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

    form.addEventListener("submit", async function (event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        console.log("📩 Se ha intentado enviar el formulario.");
        let valid = true;

        // Resetear mensajes de error
        emailWarning.textContent = "";
        emailWarning.classList.remove("active"); // Ocultar mensaje de error
        passwordWarning.textContent = "";
        passwordWarning.classList.remove("active"); // Ocultar mensaje de error

        // Validar email
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailValue === "") {
            console.log("⚠️ Error: Email vacío.");
            emailWarning.textContent = "El email es obligatorio.";
            emailWarning.classList.add("active"); // Mostrar mensaje de error
            valid = false;
        } else if (!emailRegex.test(emailValue)) {
            console.log("⚠️ Error: Formato de email inválido.");
            emailWarning.textContent = "Formato de email inválido.";
            emailWarning.classList.add("active"); // Mostrar mensaje de error
            valid = false;
        }

        // Validar contraseña
        const passwordValue = passwordInput.value.trim();
        if (passwordValue === "") {
            console.log("⚠️ Error: Contraseña vacía.");
            passwordWarning.textContent = "La contraseña es obligatoria.";
            passwordWarning.classList.add("active"); // Mostrar mensaje de error
            valid = false;
        } else if (passwordValue.length < 6) {
            console.log("⚠️ Error: Contraseña muy corta.");
            passwordWarning.textContent = "La contraseña debe tener al menos 6 caracteres.";
            passwordWarning.classList.add("active"); // Mostrar mensaje de error
            valid = false;
        }


        // Enviar datos al servidor para validar el inicio de sesión
        try {
            const response = await fetch('validar_login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ usuario: emailValue, contraseña: passwordValue })
            });

            const result = await response.json();

            if (result.success) {
                window.location.href = 'menuLibros.php'; // Redirigir si las credenciales son correctas
            } else {
                // Mostrar mensaje de error en rojo
                if (result.message.includes('Usuario')) {
                    emailWarning.textContent = result.message;
                    emailWarning.classList.add("active");
                } else if (result.message.includes('Contraseña')) {
                    passwordWarning.textContent = result.message;
                    passwordWarning.classList.add("active");
                }
            }
        } catch (error) {
            console.error("❌ Error al enviar la solicitud:", error);
            alert("Hubo un error al intentar iniciar sesión. Por favor, inténtalo de nuevo.");
        }
    });
});