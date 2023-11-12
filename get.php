<?php
// Conexión a la base de datos (reutiliza la conexión desde index.php)
include "index2.php";

if (isset($_GET["tabla"]) && isset($_GET["id"])) {
    $tablaSeleccionada = $_GET["tabla"];
    $idSeleccionado = $_GET["id"];

    // Consulta para obtener la información del registro seleccionado
    $informacion_sql = "SELECT * FROM $tablaSeleccionada WHERE id = $idSeleccionado";
    $informacion_result = $conn->query($informacion_sql);

    if ($informacion_result->num_rows > 0) {
        $informacion_row = $informacion_result->fetch_assoc();
        
        echo "ID: " . $informacion_row["id"] . "<br>";
        echo "Nombre: " . $informacion_row["nombre"] . "<br>";
        // ... continua con los campos adicionales ...
    } else {
        echo "Información no disponible.";
    }
}
?>
