<?php
$server = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "bibliobosco";

$conexion = mysqli_connect($server, $usuario, $contraseña, $bd) 
    or die ("Error al conectar con la BD" . mysqli_connect_error());

// Captura de datos del formulario
$email = trim($_POST['email'] ?? '');
$contraseña = trim($_POST['contraseña'] ?? '');
$repite_contraseña = trim($_POST['repite_contraseña'] ?? '');

// Validaciones del lado del servidor
if (empty($email) || empty($contraseña) || empty($repite_contraseña)) {
    echo "<div class='error-msg'>⚠️ Todos los campos son obligatorios.</div>";
    exit;
}

// Validación del formato de correo
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<div class='error-msg'>❌ El correo no tiene un formato válido.</div>";
    exit;
}

// Validación de contraseña segura
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $contraseña)) {
    echo "<div class='error-msg'>❌ La contraseña debe tener al menos 8 caracteres e incluir letras y números.</div>";
    exit;
}

// Verificar coincidencia de contraseñas
if ($contraseña !== $repite_contraseña) {
    echo "<div class='error-msg'>❌ Las contraseñas no coinciden.</div>";
    exit;
}

// Inserción de datos
$sql = "INSERT INTO datos_registro (email, contraseña, repite_contraseña) 
        VALUES ('$email', '$contraseña', '$repite_contraseña');";

if (mysqli_query($conexion, $sql)) {
    echo "<div class='success-msg'>✅ Registro exitoso.</div>";
} else {
    echo "<div class='error-msg'>❌ Error al registrar: " . mysqli_error($conexion) . "</div>";
}
?>
