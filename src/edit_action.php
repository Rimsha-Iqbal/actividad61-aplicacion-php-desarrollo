<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta Servicios Eventos</title>
</head>
<body>
<div>
	<header>
		<h1>Decoraciones Con Rimsha</h1>
	</header>
	<main>

<?php
/* Se Comprueba si se ha llegado a esta página PHP a través del formulario de altas. 
Para ello se comprueba la variable de formulario: "inserta" enviada al pulsar el botón Agregar.
Los datos del formulario se acceden por el método: POST
*/

if(isset($_POST['modifica'])) 
{
/*Se obtienen los datos del servicio (tipo_evento, nombre_servicio, encargado, etc.) a partir del formulario de alta (name, surname, age y job) por el método POST.
Se envía a través del body del HTTP Request. */

	$id_servicio = $mysqli->real_escape_string($_POST['id_servicio']);
	$tipo_evento = $mysqli->real_escape_string($_POST['tipo_evento']);
	$nombre_servicio = $mysqli->real_escape_string($_POST['nombre_servicio']);
	$encargado = $mysqli->real_escape_string($_POST['encargado']);
	$contacto = $mysqli->real_escape_string($_POST['contacto']);
	$precio_estimado = $mysqli->real_escape_string($_POST['precio_estimado']);
	$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
	$fecha_creacion = $mysqli->real_escape_string($_POST['fecha_creacion']);
	

/* Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL. */

	//Se comprueba si existen campos del formulario vacíos
	if(empty($tipo_evento) || empty($nombre_servicio) || empty($encargado) || empty($contacto) || empty($precio_estimado) || empty($descripcion)  ) 
	{
		if(empty($tipo_evento)) {
			echo "<div>Campo tipo de evento vacío.</div>";
		}

		if(empty($nombre_servicio)) {
			echo "<div>Campo nombre de servicio vacío.</div>";
		}

		if(empty($encargado)) {
			echo "<div>Campo encargado vacío.</div>";
		}

		if(empty($contacto)) {
			echo "<div>Campo contacto vacío.</div>";
		}
		
		if(empty($precio_estimado)) {
			echo "<div>Campo precio estimado vacío.</div>";
		}
		
		if(empty($descripcion)) {
			echo "<div>Campo descripción vacío.</div>";
		}
		
		
		
		//Enlace a la página anterior
		//Se cierra la conexión
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
	} //fin si
	else //Sino existen campos de formulario vacíos se procede al alta del nuevo registro
	{
		//Se ejecuta una sentencia SQL. Inserta (da de alta) el nuevo registro: insert.
		
		$mysqli->query("UPDATE servicios_eventos SET tipo_evento = '$tipo_evento', nombre_servicio = '$nombre_servicio',  encargado = '$encargado', contacto = '$contacto', precio_estimado = '$precio_estimado', descripcion = '$descripcion', fecha_creacion = '$fecha_creacion'  WHERE id_servicio = $id_servicio");
			
	
		
		//Verifica si la consulta fue exitosa
		$mysqli->close();
        echo "<div>Registro editado correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
		//Se redirige a la página principal: index.php
		//header("Location:index.php");
	} //fin sino
}
?>

</main>
</div>
</body>
</html>


