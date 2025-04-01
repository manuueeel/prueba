<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloRegistro.css"/>
    <link rel="stylesheet" href="css/estiloErrores.css">
    <title>Registrar usuario</title>

</head>
<body>
    <div class="content">
        <div class="caja">
            <h2 class="hiniciosession">Registro</h2>
            <a href="main.php" class="boton-inicio">🏠 Volver al Inicio</a>
            <form action="guarda_registro.php" method="POST" id="form-reg">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Introduce tu correo"><span id="error-email" class="error"></span><br>
                <label for="password" >Contraseña</label>
                <input type="password" id="password" name="contraseña" placeholder="Introduce tu contraseña"><span id="error-contra" class="error"></span><br>
                <div class="warning"><p id="pwarning"></p></div>
                <label for="password2">Repite la contraseña</label>
                <input type="password" id="contraseña" name="repite_contraseña" placeholder="Repite la contraseña"><span id="error-contra" class="error"></span>
                <div class="warning"><p id="ppwarning"></p></div>
                <input type="submit" value="Registrar" name="btnregistrar">
                <div class="registro">
                    <p>¿Tienes cuenta? <a href="login.php">Iniciar Sesión</a></p>
                </div>
            </form>
        </div>
        <script src="scriptRegistro.js" defer></script>

        
    </div>
    

</body>
</html>
