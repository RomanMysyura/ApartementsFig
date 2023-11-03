<?php
function controllerUpdateUser($request, $response, $container) {
    // Obtén los datos del formulario
    $id_user = $_SESSION["user"]["id_user"]; // Asume que tienes una sesión con la ID del usuario
    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $telephone = $request->get(INPUT_POST, "telephone");
    $email = $request->get(INPUT_POST, "email");
    $card_number = $request->get(INPUT_POST, "card_number");

    // Accede al modelo de usuarios
    $userModel = $container->users();

    // Llama a la función updateUser para actualizar los datos
    $userModel->updateUser($id_user, $name, $last_name, $telephone, $email, $card_number);

    // Redirige a la página de cuenta o a donde desees
    $response->redirect("location: index.php?r=compte");
    
}
