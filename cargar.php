<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la elección del usuario y limpiarla
    $tabla = isset($_POST["tabla"]) ? htmlspecialchars($_POST["tabla"]) : "";

    // Conexión a la base de datos (reemplaza con tus propios valores)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "psh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Construir la consulta según la tabla seleccionada
    switch ($tabla) {
        case "tabla1":
            $sql = "SELECT * FROM actores";
            break;
        case "tabla2":
            $sql = "SELECT * FROM familiares";
            break;
        // Agrega más casos para otras tablas si es necesario
        default:
            echo "Tabla no válida.";
            exit;
    }

    // Ejecutar la consulta y mostrar los resultados
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Mostrar los resultados en el formato que desees
            echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
