<!DOCTYPE html>
<html lang="es">
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
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Alta Servicio</a></li>
	</ul>
	<h2>Listado de Servicios de Decoración</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Tipo de Evento</th>
			<th>Nombre del Servicio</th>
			<th>Encargado</th>
			<th>Precio Estimado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
// Conexión a la base de datos
$mysqli = new mysqli("localhost", "usuario_tu_nombre_tu_1º_apellido", "tu_nombre_tu_1º_apellido@tu_año_nacimiento", "actividad61_tu_nombre_tu_1º_apellido");

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Consulta para obtener los servicios de decoración
$resultado = $mysqli->query("SELECT * FROM servicios_eventos ORDER BY tipo_evento, nombre_servicio");

// Cierra la conexión de la BD
$mysqli->close();

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['tipo_evento']."</td>\n";
		echo "<td>".$fila['nombre_servicio']."</td>\n";
		echo "<td>".$fila['encargado']."</td>\n";
		echo "<td>".$fila['precio_estimado']."€</td>\n";
		echo "<td>";
		echo "<a href=\"edit.php?id_servicio=".$fila['id_servicio']."\">Editar</a> | ";
		echo "<a href=\"delete.php?id_servicio=".$fila['id_servicio']."\" onClick=\"return confirm('¿Está seguro de eliminar este servicio?')\">Eliminar</a>";
		echo "</td>\n";
		echo "</tr>\n";
	}
} else {
    echo "<tr><td colspan='5'>No hay servicios registrados.</td></tr>";
}
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
