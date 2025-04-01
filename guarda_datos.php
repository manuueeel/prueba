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
			

			if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
				$usuario = $_POST['usuario'];
				$contraseña = $_POST['contraseña'];
		
				// Aquí iría la lógica de inserción en la base de datos
				// Ejemplo ficticio:
				// mysqli_query($conexion, "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')");
		
				// Redireccionamiento tras guardar los datos
				header("Location: menuLibros.php");
				exit(); // Asegura que se detenga la ejecución después de redirigir
			} else {
				echo "Error: No se enviaron los datos correctamente.";
			}
			
			
	
			/*Vemos que se han rescatado bien los valores, los guardamos en la tabla de la BD */
			
			$sql="INSERT INTO datos (usuario, contraseña) VALUES (' ".$usuario."','".$contraseña."');";
			mysqli_query ($conexion,$sql);
			
			
			
		?>	


