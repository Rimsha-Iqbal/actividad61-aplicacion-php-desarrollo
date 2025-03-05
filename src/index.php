<?php
/* Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Decoraciones con Rimsha</title>
</head>
<body>
<div>
	<header>
		<h1>Decoraciones con Rimsha</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Alta</a></li>
	</ul>
	<h2>Lista de Servicios de Eventos</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Tipo de Evento</th>
			<th>Nombre del Servicio</th>
			<th>Encargado</th>
			<th>Contacto</th>
			<th>Precio Estimado</th>
			<th>Descripción</th>
			<th>Fecha de Creación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
/* Se realiza una consulta de selección la tabla servicios_eventos ordenados y almacena todos los registros en una estructura especial PARECIDA a una "tabla" llamada $resultado.
Cada fila y cada columna de la tabla se corresponde con un registro y campo de la tabla servicios_eventos.
*/

$resultado = $mysqli->query("SELECT * FROM servicios_eventos ORDER BY tipo_evento, nombre_servicio");

// Cierra la conexión de la BD
$mysqli->close();

// Comprobamos si el nº de fila/registros es mayor que 0
if ($resultado->num_rows > 0) {

/* A través de la estructura repetitiva "while" se recorre la "tabla" $resultados almacenando cada línea/registro en el array asociativo $fila. 
Recuerda que $fila contiene el contenido de todos los campos del registro actual tal como explicamos anteriormente.
El bucle finaliza cuando se llegue a la última línea (o registro) de la tabla $resultado. 
A medida que avanza se va construyendo cada fila de la tabla HTML con todos los campos del servicio, hasta completar todos los registros*/

	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['tipo_evento']."</td>\n";
		echo "<td>".$fila['nombre_servicio']."</td>\n";
		echo "<td>".$fila['encargado']."</td>\n";
		echo "<td>".$fila['contacto']."</td>\n";
		echo "<td>".$fila['precio_estimado']."</td>\n";
		echo "<td>".$fila['descripcion']."</td>\n";
		echo "<td>".$fila['fecha_creacion']."</td>\n";
		echo "<td>";
/* En la última columna se añade dos enlaces para editar y modificar el registro correspondiente. 
Los datos se pueden enviar entre distintas páginas siguiendo distintos métodos. En este caso el id del registro a editar/eliminar se pasa a través de la URL. 
Este forma de pasar el dato se conoce como: método GET*/
		echo "<a href=\"edit.php?id_servicio=$fila[id_servicio]\">Edición</a>\n";
		echo "<a href=\"delete.php?id_servicio=$fila[id_servicio]\" onClick=\"return confirm('¿Está segur@ que desea eliminar este servicio?')\" >Baja</a></td>\n";
		echo "</td>";
		echo "</tr>\n";
	}//fin mientras
}//fin si
?>
	</tbody>
	</table>
	</main>
	<footer>
    	Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>