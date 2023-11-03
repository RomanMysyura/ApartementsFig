<?php
function controllerDeleteUser($request, $response, $container) {
    $userModel = $container->users();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];
            $userModel->deleteUser($user_id); 
        }
    }

    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}
