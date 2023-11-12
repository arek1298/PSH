<?php
// Ejemplo de búsqueda utilizando una base de datos MySQL
$conn = new mysqli('localhost', 'root', '', 'psh');

$RFC = $_GET['RFC'];

// Verificar si se han enviado datos de búsqueda
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener los criterios de búsqueda ingresados
    $RFC = $_GET["RFC"];

    // Consulta SQL para buscar datos en la tabla
    $query = "SELECT * FROM cat_trabajadores WHERE RFC LIKE '%$RFC%'";  

    // Ejecutar la consulta
    $result = $conn->query($query);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<table class='styled-table'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>RFC</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["ID"]."</td>
            <td>".$row["NOMBRE"]."</td>
            <td>".$row["RFC"]."</td>
        </tr>";
}

echo "</table>";


} else {
    //echo "No se encontraron resultados.";
    echo '<script>alert("No se encontraron resultados");</script>';
    //header("Location: index.php");
    
}
}


// Cierra la conexión a la base de datos
$conn->close();

$RFC= $_GET['RFC'];

?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>

    <a href="index.php">Volver</a>
    <title>Búsqueda</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
