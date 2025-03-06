<?php
/*Incluye parámetros de conexión a la base de datos: 
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
	<title>Decoraciones Con Rimsha</title>
	<style>
		body {
			background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
			font-family: 'Arial', sans-serif;
			color: #333;
			margin: 0;
			padding: 0;
		}
		header {
			background: rgba(255, 255, 255, 0.8);
			padding: 20px;
			text-align: center;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}
		h1 {
			margin: 0;
			font-size: 2.5em;
			color: #ff6f61;
		}
		main {
			padding: 20px;
			background: rgba(255, 255, 255, 0.9);
			margin: 20px auto; /* Center the main content */
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			max-width: 1200px; /* Limit width for better readability */
		}
		ul {
			list-style-type: none;
			padding: 0;
			text-align: center; /* Center the list items */
		}
		ul li {
			display: inline-block; /* Display list items in a line */
			margin: 0 15px; /* Add spacing between items */
		}
		ul li a {
			text-decoration: none;
			color: #ff6f61;
			font-weight: bold;
			font-size: 1.2em;
		}
		ul li a:hover {
			color: #ff3b2f;
		}
		h2 {
			text-align: center; /* Center the heading */
			color: #ff6f61;
			margin-top: 20px;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}
		table, th, td {
			border: 1px solid #ddd;
		}
		th, td {
			padding: 12px;
			text-align: left;
		}
		th {
			background-color: #ff6f61;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f9f9f9;
		}
		tr:hover {
			background-color: #f1f1f1;
		}
		footer {
			text-align: center;
			padding: 10px;
			background: rgba(255, 255, 255, 0.8);
			position: fixed;
			width: 100%;
			bottom: 0;
			box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
		}
	</style>
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
				</tr>
			</thead>
			<tbody>

<?php
$resultado = $mysqli->query("SELECT * FROM servicios_eventos ORDER BY tipo_evento, nombre_servicio");

$mysqli->close();

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
}
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