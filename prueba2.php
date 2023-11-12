<!DOCTYPE html>
<html>
<head>
    <title>Doble Combo - Consulta de Productos por Categoría</title>
</head>
<body>
    <h1>Consulta de Productos por Categoría</h1>

    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "psh";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener las categorías
    $categorias_sql = "SELECT id, nombre FROM members";
    $categorias_result = $conn->query($categorias_sql);
    ?>

    <form action="procesar.php" method="post">
        <label for="categoria">Selecciona una categoría:</label>
        <select name="categoria" id="categoria">
            <?php
            // Generar opciones del primer combo con los datos de categorías
            if ($categorias_result->num_rows > 0) {
                while ($categoria_row = $categorias_result->fetch_assoc()) {
                    echo "<option value='" . $categoria_row["id"] . "'>" . $categoria_row["nombre"] . "</option>";
                }
            }
            ?>
        </select>
        <br>

        <label for="producto">Selecciona un producto:</label>
        <select name="producto" id="producto">
            <!-- Las opciones del segundo combo se llenarán mediante JavaScript según la selección de categoría -->
        </select>
        <br>
        <input type="submit" value="Consultar Detalles">
    </form>

    <script>
        // Script para cargar productos según la categoría seleccionada
        document.getElementById("categoria").addEventListener("change", function() {
            var categoriaId = this.value;
            var productoCombo = document.getElementById("producto");

            // Limpia las opciones anteriores
            while (productoCombo.firstChild) {
                productoCombo.removeChild(productoCombo.firstChild);
            }

            // Consulta para obtener los productos de la categoría seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_productos.php?categoria_id=" + categoriaId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var productos = JSON.parse(xhr.responseText);
                    productos.forEach(function(producto) {
                        var option = document.createElement("option");
                        option.value = producto.id;
                        option.textContent = producto.nombre_producto;
                        productoCombo.appendChild(option);
                    });
                }
            };
            xhr.send();
        });
    </script>

    <?php
    $conn->close();
    ?>
</body>
</html>
