<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "bibliobosco";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha proporcionado un ID de libro válido
if (isset($_GET['libro_id']) && is_numeric($_GET['libro_id'])) {
    $libro_id = intval($_GET['libro_id']); // Convertir a entero

    // Obtener el título del libro
    $query_libro = "SELECT titulo FROM libros WHERE id_libro = $libro_id";
    $resultado_libro = mysqli_query($conexion, $query_libro);

    // Verificar si la consulta se ejecutó correctamente
    if ($resultado_libro === false) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    // Verificar si se encontró el libro
    if (mysqli_num_rows($resultado_libro) > 0) {
        $libro = mysqli_fetch_assoc($resultado_libro);
    } else {
        die("Libro no encontrado.");
    }
} else {
    die("ID de libro no válido.");
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dejar una reseña</title>
    <link rel="stylesheet" href="Css/estiloLibros.css"/>
</head>
<body>
    <main>
        <h1>Dejar una reseña</h1>
        <p>Libro: <?php echo htmlspecialchars($libro['titulo']); ?></p>
        <form action="guarda_reseña.php" method="POST">
            <input type="hidden" name="libro_id" value="<?php echo $libro_id; ?>">
            <input type="hidden" name="id" value="<?php echo $usuario_id; ?>">
            <textarea name="comentario" rows="5" cols="40" placeholder="Escribe tu reseña aquí..." required></textarea>
            <br><br>
            <button type="submit">Enviar reseña</button>
        </form>
    </main>
</body>
</html>