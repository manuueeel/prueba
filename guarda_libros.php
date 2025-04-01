<!DOCTYPE html>
<html>
    
    <!--EN ÉSTE ARCHIVO: AÑADIR_DATOS.PHP LO QUE HACEMOS ES RECOGER LOS DATOS QUE SE HAN INTRODUCIDO EN EL FORMULARIO DEL ARCHIVO INDEX Y GUARDARLOS 
    EN LA TABLA QUE HEMOS CREADO EN LA BASE DE DATOS-->
    
    <title>
        
        <meta charset="UTF-8">
        <title>Guardar datos</title>
    
    
    </title>
    
    <body>

        <?php
            
            /*LO PRIMERO QUE HACEMOS ES LA CONEXIÓN CON LA BASE DE DATOS
             para ello creamos tres variables con los datos que vamos a necesitar, que son:
             El nombre del servidor (localhost), usuario (root, por defecto), la contraseña (no le hemos puesto), y el nombre que le hayamos puesto a la base de datos.
             También crearemos una variable para guardar los datos de la conexión.
             */

            $server="localhost";
            $usuario="root";
            $contraseña="";
            $bd="bibliobosco";
            
            /*Para realizar la conexión a mysql necesitamos llamar a la función mysqli_connect () */
            
            $conexion=mysqli_connect($server, $usuario,$contraseña,$bd) or die ("Error al conectar con la BD".mysql_error());
            
            /*Ya tenemos la conexión hecha, ahora tenemos que indicar al sistema cual es la BD con la que queremos trabajar */
            
            /*mysqli_select_db ($bd, $conexion);  Tenemos que decir el nombre de la BD y la conexión, lo tenemos todo guardado en las variables */
            

            /*Para ello creamos dos variables para rescatar los valores del formulario */

            
            $titulo=$_POST['titulo'];
            $autor=$_POST['autor'];
            $indice=$_POST['indice'];
            $año_edicion=$_POST['año'];
            $portada=$_POST['portada'];
            $contraportada=$_POST['contraportada'];
            
            echo "El titulo del libro es: ".$titulo."<br>";
			echo "El autor del libro es: ".$autor. "<br>";
            echo "El indice del libro es: ".$indice. "<br>";
            echo "El año de edicion del libro es: ".$año_edicion. "<br>";
            echo "La portada del libro es: ".$portada. "<br>";
            echo "La contraportada del libro es: ".$contraportada. "<br>";
    
    
            /*Vemos que se han rescatado bien los valores, los guardamos en la tabla de la BD */
            
            $sql="INSERT INTO libros (titulo, autor, indice, año_edicion, portada, contraportada) VALUES (' ".$titulo."','".$autor."','".$indice."',".$año_edicion.",'".$portada."','".$contraportada."');";
            mysqli_query ($conexion,$sql);
            echo "Datos guardados correctamente";
            
            
            
        ?>  
        
        <a href="menuLibros.php">Volver</a>
    
    </body>
</html>
