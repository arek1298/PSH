<?php
// Conexión a la base de datos (reutiliza la conexión desde index.php)
include "index2.php";

if (isset($_GET["tabla"])) {
    $tablaSeleccionada = $_GET["tabla"];

    // Consulta para obtener los registros de la tabla seleccionada
    $registros_sql = "SELECT id, nombre FROM $tablaSeleccionada";
    $registros_result = $conn->query($registros_sql);

    $registros = array();
    if ($registros_result->num_rows > 0) {
        while ($registro_row = $registros_result->fetch_assoc()) {
            $registros[] = array(
                "id" => $registro_row["id"],
                "nombre" => $registro_row["nombre"]
            );
        }
    }

    echo json_encode($registros);
}
?>
