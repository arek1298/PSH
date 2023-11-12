<!DOCTYPE html>
<html>
<head>
    <title>Consulta a Diferentes Tablas</title>
</head>
<body>
    <form method="post" action="cargar.php">
        <label for="tabla">Selecciona una tabla:</label>
        <select name="tabla" id="tabla">
            <option value="tabla1">Members</option>
            <option value="tabla2">Familiares</option>
            <!-- Agrega más opciones para otras tablas si es necesario -->
        </select>
        <input type="submit" value="Consultar">
    </form>
</body>
</html>
