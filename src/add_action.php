<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

if (isset($_POST['inserta'])) {
    // Se obtienen los datos del formulario
    $tipo_evento = $mysqli->real_escape_string($_POST['tipo_evento']);
    $nombre_servicio = $mysqli->real_escape_string($_POST['nombre_servicio']);
    $encargado = $mysqli->real_escape_string($_POST['encargado']);
    $contacto = $mysqli->real_escape_string($_POST['contacto']);
    $precio_estimado = $mysqli->real_escape_string($_POST['precio_estimado']);
    $descripcion = $mysqli->real_escape_string($_POST['descripcion']);
    $fecha_creacion = $mysqli->real_escape_string($_POST['fecha_creacion']);

    // Se comprueba si existen campos vacíos
    if (
        empty($tipo_evento) || empty($nombre_servicio) || empty($encargado) || empty($contacto) ||
        !isset($precio_estimado) || trim($precio_estimado) === "" || empty($descripcion) || empty($fecha_creacion)
    ) {
        echo "<div>Error: Hay campos vacíos.</div>";
        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
        $mysqli->close();
        exit();
    }

    // Se ejecuta la inserción
    $query = "INSERT INTO servicios_eventos (tipo_evento, nombre_servicio, encargado, contacto, precio_estimado, descripcion, fecha_creacion) 
              VALUES ('$tipo_evento', '$nombre_servicio', '$encargado', '$contacto', '$precio_estimado', '$descripcion', '$fecha_creacion')";
    
    if ($mysqli->query($query)) {
        $mysqli->close();
        header("Location: index.php");
        exit();
    } else {
        echo "<div>Error al añadir el registro: " . $mysqli->error . "</div>";
        $mysqli->close();
    }
}
?>

