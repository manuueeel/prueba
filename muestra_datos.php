<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mostrando datos</title>
    <link rel="stylesheet" href="Css/estiloLibros.css"/>
</head>
<body>
    <main>
        <?php
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $bd = "bibliobosco";
        $tabla = "libros";

        // Conexión a la base de datos
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd) 
            or die("Error de conexión: " . mysqli_connect_error());


        // Consulta SQL
        $consulta = "SELECT * FROM $tabla";
        $datos = mysqli_query($conexion, $consulta);

        // Verificar si hay resultados
        if (mysqli_num_rows($datos) > 0) {
            echo '<p class="entradaLibros">Libros registrados en la biblioteca del ies san juan bosco: </p>';

            // Abrir el contenedor de libros
            echo '<section class="libros">';

            while ($fila = mysqli_fetch_array($datos)) {
                ?>

                <!-- Cada libro dentro del contenedor .libros -->
                <div class="libro">
                    <!-- Contenido visible -->
                    <img src="images/<?php echo $fila["portada"]; ?>" alt="Portada" style="width: 150px; height: 200px; object-fit: cover;">
                    <h2><?php echo $fila["titulo"] ?></h2>
                    <p>Autor: <?php echo $fila["autor"] ?></p>
                    <!-- Botón "Mostrar más" -->
                    <button class="mostrar-mas">Mostrar más</button>

                    <!-- Contenido oculto -->
                    <div class="contenido-oculto">
                        <p>Índice: <?php echo $fila["indice"] ?></p>
                        <p>Año de edición: <?php echo $fila["año_edicion"] ?></p>
                        <a href="formulario_reseña.php?libro_id=<?php echo $fila['id_libro']; ?>" class="btnReseña">Dejar reseña</a>
                        <a href="ver_reseñas.php?libro_id=<?php echo $fila['id_libro']; ?>" class="btnReseña">Ver reseña</a>
                    </div>
                </div>

                <?php
            }

            // Cerrar el contenedor de libros
            echo '</section>';
        } else {
            echo "<p>No hay datos en la tabla</p>";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
        ?>
        
        <a href="menuLibros.php" class="btnInicio">Volver al inicio</a>
    </main>

    <!-- Incluir el archivo JavaScript -->
    <script src="scriptListado.js"></script>
</body>
</html>