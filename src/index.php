<?php
include_once("config.php");

$resultado = $mysqli->query("SELECT * FROM servicios_eventos ORDER BY tipo_evento, nombre_servicio");
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
			<li><a href="index.php">Inicio</a></li>
			<li><a href="add.html">Alta</a></li>
		</ul>
		<h2>Servicios Eventos</h2>
		<table border="1">
			<thead>
				<tr>
					<th>Tipo Evento</th>
					<th>Nombre Servicio</th>
					<th>Encargado</th>
					<th>Contacto</th>
					<th>Precio Estimado</th>
					<th>Descripcion</th>
					<th>Fecha Creacion</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

<?php
if ($resultado->num_rows > 0) {
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
		echo "<a href=\"edit.php?id_servicio={$fila['id_servicio']}\">Editar</a> | ";
        echo "<a href=\"delete.php?id_servicio={$fila['id_servicio']}\" onClick=\"return confirm('¿Está segur@ que desea eliminar este servicio?')\">Eliminar</a>";
		echo "</td>";
		echo "</tr>\n";
	}
} else {
    echo "<tr><td colspan='8'>No hay servicios disponibles.</td></tr>";
}

$mysqli->close(); // Close after fetching results
?>
			</tbody>
		</table>
	</main>
	<footer>
    	Created by RIMSHA &copy; 2025
  	</footer>
</div>
</body>
</html>
