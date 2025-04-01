
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloLogin.css"/>
    <link rel="stylesheet" href="css/estiloErrores.css"/>
    <title>Iniciar sesión</title>
</head>
<body>

<div class="content">
        <div class="caja">
            <h2 class="hiniciosession">INICIO DE SESIÓN</h2>
            <a href="main.php" class="boton-inicio">🏠 Volver al Inicio</a>
            <form id="form-ses" action="guarda_datos.php" method="POST">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="usuario" placeholder="Introduce tu correo">
                <p id="ewarning" class="warning"></p>
                
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="contraseña" placeholder="Introduce tu contraseña">
                <p id="pwarning" class="warning"></p>
                
                <button id="btn" type="submit">Iniciar Sesión</button>
                <div class="registro">
                    <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
                </div>
            </form>
        </div>
    </div>

    <script  src="sLogin.js"></script>

</body>
</html>
