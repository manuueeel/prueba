<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "bibliobosco";


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd) 
    or die("Error de conexión: " . mysqli_connect_error());


// Obtener los datos del formulario
$libro_id = intval($_POST['libro_id']); 
//$usuario_id = intval($_POST['usuario_id']);  // <-- Ahora el ID del usuario viene del formulario
$comentario = mysqli_real_escape_string($conexion, $_POST['comentario']);

// Insertar la reseña en la base de datos con la fecha actual
$query = "
    INSERT INTO resenas (libro_id, comentario, fecha) 
    VALUES ($libro_id, '$comentario', CURDATE())
";
echo $query;

if (mysqli_query($conexion, $query)) {
    mysqli_close($conexion);
    header("Location: ver_reseñas.php");
    exit;
} else {
    echo "Error al guardar la reseña: " . mysqli_error($conexion);
    mysqli_close($conexion);
}
?>
