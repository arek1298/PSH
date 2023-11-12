<?php
session_start();  // Iniciar sesión (si aún no está iniciada)

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

// Mostrar información del usuario
#echo "Bienvenido, " . $_SESSION["usuario"] . "!"; 


?>




<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
  <style>
    body {
      background-color: #d1fff7; /* Cambia #ff0000 por el color que desees */
    }
    </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#" style="color:blue"><img style="width: 150px" src="logos/issste.png">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link"><?php echo "Bienvenido, " . $_SESSION["usuario"] . "";?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="destruir.php">Salir del sistema</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catálogos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Opción 1</a>
          <a class="dropdown-item" href="#">Opción 2</a>
          <a class="dropdown-item" href="#">Opción 3</a>
        </div>
      </li>
    </ul>

    
  </div>
</nav>
<br>

<!--BUSQUEDA GENERAL-->


<body>
<body>
    <!--CONTENEDOR buscar-->
   
   <!--Lo pegas en la búsqueda-->
   <form action="" method="get">
        <label>Buscar:</label>
        <input type="text" name="consulta">
        <select name="tipo_busqueda">
            <option value="nombre">Nombre</option>
            <option value="rfc">rfc</option>
            <option value="noPension">noPension</option>
        </select>
        <input type="submit" value="Buscar">
    </form>

    <?php
    // Conexión a la base de datos (cambiar según tus configuraciones)
    $conexion = new mysqli("localhost", "root", "", "psh");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    if (isset($_GET['consulta']) && isset($_GET['tipo_busqueda'])) {
      $consulta = $_GET['consulta'];
      $tipo_busqueda = $_GET['tipo_busqueda'];

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
  }

    $conexion->close();
    ?>
  <!--SCRIPT PARA LIMPIAR DATOS DE UN BOTÓN-->

  <script>
function limpiarFormulario() {
  document.getElementById("miFormulario").reset();
}
</script>
</form>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card" style="background-color: #d1e1e3; color: #000000;">
        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
        <div class="card-body">
          <h5 class="card-title">Sistema de Correspondencia</h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-light">Ingresar</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="background-color: #d1e1e3; color: #000000;">
        <img src="imagen2.jpg" class="card-img-top" alt="Imagen 2">
        <div class="card-body">
          <h5 class="card-title">RT</h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-light">Ingresar</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="background-color: #d1e1e3; color: #000000;">
        <img src="imagen3.jpg" class="card-img-top" alt="Imagen 3">
        <div class="card-body">
          <h5 class="card-title">Archivos</h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-light">Ingresar</a>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="col-md-4">
      <div class="card" style="background-color: #d1e1e3; color: #000000;">
        <img src="imagen3.jpg" class="card-img-top" alt="Imagen 3">
        <div class="card-body">
          <h5 class="card-title">Pagos</h5>
          <p class="card-text"></p>
          <a href="#" class="btn btn-light">Ingresar</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
