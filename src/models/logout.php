<?php
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_start(); // Iniciar la sesión
    session_unset(); // Destruir todas las variables de sesión
    session_destroy(); // Destruir la sesión

    // Redirigir al usuario a la página de inicio de sesión
    header("Location: index.php?r=login");
    exit();
}
?>
