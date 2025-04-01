<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "bibliobosco";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd) 
    or die("Error de conexión: " . mysqli_connect_error());

// Validar y sanitizar el parámetro id_libro

if (isset($_GET['libro_id'])) {
    $libro_id = intval($_GET['libro_id']); // Convertir a entero
} else {
    die("La reseña se ha guardado.");
}

// Obtener las reseñas de la base de datos
$query = "
    SELECT r.comentario, r.fecha, l.titulo AS libro
    FROM resenas r
    JOIN libros l ON r.libro_id = l.id_libro
    WHERE r.libro_id = ".$libro_id."
    ORDER BY r.fecha DESC
";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reseñas</title>
    <link rel="stylesheet" href="Css/estiloLibros.css"/>
</head>
<body>
    <main>
        <h1>Reseñas de libros</h1>
        <?php if (mysqli_num_rows($resultado) > 0): ?>
            <?php while ($resenas = mysqli_fetch_assoc($resultado)): ?>
                <div class="reseña">
                    <h3><?php echo htmlspecialchars($resenas['libro']); ?></h3>
                    <p><?php echo htmlspecialchars($resenas['comentario']); ?></p>
                    <p><em><?php echo htmlspecialchars($resenas['fecha']); ?></em></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay reseñas para este libro.</p>
        <?php endif; ?>
        <a href="menuLibros.php" class="boton-inicio">🏠 Volver al Inicio</a>
    </main>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>