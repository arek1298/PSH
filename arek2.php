<!DOCTYPE html>
<html>
<head>
    <title>Resultados de Búsqueda</title>
</head>
<body>
    <h1>Resultados de Búsqueda</h1>

    <?php
    // Conexión a la base de datos (cambiar según tus configuraciones)
    $conexion = new mysqli("localhost", "root", "", "psh");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $consulta = $_GET['consulta'];
    $tipo_busqueda = $_GET['tipo_busqueda'];

    $consulta_sql = "";

    if ($tipo_busqueda === "nombre") {
        $consulta_sql = "SELECT * FROM actores WHERE nombre LIKE '%$consulta%'";
    } elseif ($tipo_busqueda === "rfc") {
        $consulta_sql = "SELECT * FROM actores WHERE rfc LIKE '%$consulta%'";
    } elseif ($tipo_busqueda === "noPension") {
        $consulta_sql = "SELECT * FROM actores WHERE noPension = '$consulta'";
    } else {
        echo "Tipo de búsqueda no válido.";
        exit;
    }

    $resultado = $conexion->query($consulta_sql);

    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>RFC</th><th>NoPension</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['rfc'] . "</td>";
            echo "<td>" . $fila['noPension'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }

    $conexion->close();
    ?>
</body>
</html>
