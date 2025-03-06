<?php
/* Database connection parameters */
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decoraciones Con Rimsha</title>
    <style>
        /* Modern and professional styling */
        body {
            background: #f4f4f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background: #ffffff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            color: #ff6f61;
            font-weight: 600;
        }

        main {
            padding: 20px;
            background: #ffffff;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin: 20px 0;
        }

        nav ul li {
            display: inline-block;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #ff6f61;
            font-weight: 600;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ff3b2f;
        }

        h2 {
            text-align: center;
            color: #ff6f61;
            margin-top: 20px;
            font-size: 2em;
            font-weight: 500;
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
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            text-decoration: none;
            color: #ff6f61;
            margin: 0 5px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .actions a:hover {
            color: #ff3b2f;
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #ffffff;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <h1>Decoraciones Con Rimsha</h1>
        </header>

        <main>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="add.html">Alta</a></li>
                </ul>
            </nav>

            <h2>Servicios de Eventos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tipo Evento</th>
                        <th>Nombre Servicio</th>
                        <th>Encargado</th>
                        <th>Contacto</th>
                        <th>Precio Estimado</th>
                        <th>Descripción</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultado = $mysqli->query("SELECT * FROM servicios_eventos ORDER BY tipo_evento, nombre_servicio");

                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $fila['tipo_evento'] . "</td>";
                            echo "<td>" . $fila['nombre_servicio'] . "</td>";
                            echo "<td>" . $fila['encargado'] . "</td>";
                            echo "<td>" . $fila['contacto'] . "</td>";
                            echo "<td>" . $fila['precio_estimado'] . "</td>";
                            echo "<td>" . $fila['descripcion'] . "</td>";
                            echo "<td>" . $fila['fecha_creacion'] . "</td>";
                            echo "<td class='actions'>";
                            echo "<a href=\"edit.php?id_servicio={$fila['id_servicio']}\">Editar</a> | ";
                            echo "<a href=\"delete.php?id_servicio={$fila['id_servicio']}\" onClick=\"return confirm('¿Está segur@ que desea eliminar este servicio?')\">Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' style='text-align: center;'>No hay servicios registrados.</td></tr>";
                    }

                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </main>

        <footer>
            &copy; 2025 Decoraciones Con Rimsha. Todos los derechos reservados.
        </footer>
    </div>
</body>
</html>