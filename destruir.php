<?php
session_start(); // Iniciar sesión (si aún no está iniciada)

// Destruir la sesión
session_destroy();

// Redireccionar a la página de inicio u otra página
header("Location: index.php");
exit();
?>
