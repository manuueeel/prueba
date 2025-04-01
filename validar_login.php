<?php
session_start();

$server = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "bibliobosco";

$conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die("Error al conectar con la BD: " . mysqli_connect_error());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['usuario']; // Asegúrate de que el nombre del campo coincida con el formulario
    $contraseña = $data['contraseña'];

    // Consulta para verificar si el usuario existe en la tabla `registro`
    $sql = "SELECT * FROM datos_registro WHERE email = '$email' AND contraseña = '$contraseña'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Credenciales válidas
        $_SESSION['usuario'] = $email; // Guardar el email en la sesión
        echo json_encode(['success' => true]);
    } else {
        // Credenciales inválidas
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

mysqli_close($conexion);
?>