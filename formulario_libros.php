<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloForm.css">
    <title>Añadir libros</title>
    
</head>
<body>
    <div class="content">
        <div class="caja">
            <h2 class="hiniciosession">Registro</h2>
            <a href="menuLibros.php" >🏠 Volver al Inicio</a>
            <form action="guarda_libros.php" method="POST" id="form-reg">
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Introduce el titulo del libro">
                <label for="autor" >Autor</label>
                <input type="text" id="autor" name="autor" placeholder="Introduce el autor del libro">
                <label for="indice">Indice del libro</label>
                <input type="text" id="indice" name="indice" placeholder="Introduce el indice del libro">
                <label for="año de edicion">Año de edición</label>
                <input type="text" id="año" name="año" placeholder="Introduce el año de edición">
                <label for="portada">Portada</label>
                <input type="file" id="portada" name="portada" placeholder="Introduce la portada">
                <label for="contraportada">Contra portada</label>
                <input type="file" id="contraportada" name="contraportada" placeholder="Introduce la contra portada">
                <input type="submit" value="Enviar" name="btnregistrar">
                
            </form>
        </div>
        
    </div>
    

</body>
</html>