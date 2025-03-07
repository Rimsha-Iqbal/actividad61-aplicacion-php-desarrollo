<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Decoraciones Con Rimsha</title>
</head>
<body>
<div>
	<header>
		<h1>Decoraciones Con Rimsha</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación Servicios Eventos</h2>

<?php
/*Obtiene el id del registro del servicio a modificar, id_servicio, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del servicio a modificar a través de la clave id_servicio del array asociativo $_GET y lo almacena en la variable id_servicio
$id_servicio = $_GET['id_servicio'];

//Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$id_servicio = $mysqli->real_escape_string($id_servicio);

//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT tipo_evento, nombre_servicio, encargado, contacto, precio_estimado, descripcion, fecha_creacion FROM servicios_eventos WHERE id_servicio = $id_servicio");

//Se extrae el registro y lo guarda en el array $fila
$fila = $resultado->fetch_array();

$tipo_evento = $fila['tipo_evento'];
$nombre_servicio = $fila['nombre_servicio'];
$encargado = $fila['encargado'];
$contacto = $fila['contacto'];
$precio_estimado = $fila['precio_estimado'];
$descripcion = $fila['descripcion'];
$fecha_creacion = $fila['fecha_creacion'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>

<!-- FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php -->
	<form action="edit_action.php" method="post">
		<div>
			<label for="tipo_evento">Tipo Evento</label>
			<input type="text" name="tipo_evento" id="tipo_evento" value="<?php echo $tipo_evento;?>" required>
		</div>

		<div>
			<label for="nombre_servicio">Nombre Servicio</label>
			<select name="nombre_servicio" id="nombre_servicio" required>
				<option value="<?php echo $nombre_servicio;?>" selected><?php echo $nombre_servicio;?></option>
				<option value="Cumpleaños">Cumpleaños</option>
				<option value="Boda">Boda</option>
				<option value="Corporativo">Corporativo</option>
				<option value="Diseño Interior">Diseño Interior</option>
			</select>
		</div>

		<div>
			<label for="encargado">Encargado</label>
			<input type="text" name="encargado" id="encargado" value="<?php echo $encargado;?>" required>
		</div>

		<div>
			<label for="contacto">Contacto</label>
			<input type="text" name="contacto" id="contacto" value="<?php echo $contacto;?>" required>
		</div>
		
		<div>
			<label for="precio_estimado">Precio Estimado (€)</label>
			<input type="number" name="precio_estimado" id="precio_estimado" value="<?php echo $precio_estimado;?>" required>
		</div>
		
		<div>
			<label for="descripcion">Descripción</label>
			<input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>" required>
		</div>
		
		<div>
			<label for="fecha_creacion">Fecha Creación</label>
			<input type="text" name="fecha_creacion" id="fecha_creacion" value="<?php echo $fecha_creacion;?>" required>
		</div>

		<div>
			<input type="hidden" name="id_servicio" value="<?php echo $id_servicio;?>">
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>

	</main>	
	<footer>
		Created by RIMSHA &copy; 2024
  	</footer>
</div>
</body>
</html>

