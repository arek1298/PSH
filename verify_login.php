<?php
// Configuración de la base de datos
$host = 'localhost';  
$db = 'psh';  
$user = 'root';  
$password = '';  

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}



//VALIDAR

session_start();  // Iniciar sesión (si aún no está iniciada)

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados
    $usuario = $_POST["usuario"];
    $contrasena= $_POST["contrasena"];

    // Consulta a la base de datos para verificar las credenciales
    $query = "SELECT * FROM members WHERE usuario= '$usuario' AND contrasena= '$contrasena'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Credenciales válidas, inicio de sesión exitoso
        $_SESSION["usuario"] = $usuario;  // Almacenar el nombre de usuario en la sesión
        header("Location: index.php");  // Redireccionar a la página de bienvenida
        exit();
    } else {
        // Credenciales inválidas, mostrar un mensaje de error
        //echo "Usuario o contraseña incorrectos.";
        echo '<div class="alert alert-danger">Usuario o contraseña incorrectos.</div>';
    }
}
?>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </html>