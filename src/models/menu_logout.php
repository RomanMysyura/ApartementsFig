<?php 
$gestor = 2;
$usuari = 1;

$gestorpanel = " "; 

if (isset($_SESSION['role_id'])) {
    if ($_SESSION['role_id'] == $gestor) {
        $gestorpanel = "Panel de control";
    }
}

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    // Usuario iniciado, muestra el enlace a "compte.php"
    $compteLink = "index.php?r=compte"; 
} else {
    // Usuario no iniciado, muestra el enlace a "login.php"
    $compteLink = "index.php?r=login";
}
?>