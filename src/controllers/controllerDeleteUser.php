<?php
function controllerDeleteUser($request, $response, $container) {
    $userModel = $container->users();
    
    // Verifica si se ha realizado una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica si se envió un usuario para eliminar
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];
            $userModel->deleteUser($user_id); // Elimina el usuario
        }
    }

    // Redirige de nuevo al panel de control
    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}
