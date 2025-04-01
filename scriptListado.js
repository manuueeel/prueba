// Selecciona todos los botones "Mostrar más"
const botones = document.querySelectorAll('.mostrar-mas');

// Añade un evento de clic a cada botón
botones.forEach(boton => {
    boton.addEventListener('click', () => {
        // Encuentra el contenido oculto asociado al botón
        const contenidoOculto = boton.nextElementSibling;

        // Alternar la visibilidad del contenido oculto
        if (contenidoOculto.style.display === 'none' || contenidoOculto.style.display === '') {
            contenidoOculto.style.display = 'block'; // Muestra el contenido
            boton.textContent = 'Mostrar menos'; // Cambia el texto del botón
        } else {
            contenidoOculto.style.display = 'none'; // Oculta el contenido
            boton.textContent = 'Mostrar más'; // Cambia el texto del botón
        }
    });
});