<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Productos</title>
</head>
<body>
    <h1>Búsqueda de Productos</h1>
    <!--Lo pegas en la búsqueda-->
    <form action="arek2.php" method="get">
        <label>Buscar:</label>
        <input type="text" name="consulta">
        <select name="tipo_busqueda">
            <option value="nombre">Nombre</option>
            <option value="rfc">rfc</option>
            <option value="noPension">noPension</option>
        </select>
        <input type="submit" value="Buscar">
    </form>
</body>
</html>
