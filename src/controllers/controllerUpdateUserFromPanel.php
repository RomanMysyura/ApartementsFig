<?php
function controllerUpdateUserFromPanel($request, $response, $container) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number'];
    $id_role = $_POST['id_role'];

    $userModel = $container->users();

    $userModel->updateUser($user_id, $name, $last_name, $telephone, $email, $card_number, $id_role);

    $response->redirect("location: index.php?r=paneldecontrol");
}
