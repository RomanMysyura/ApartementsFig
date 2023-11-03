<?php
function controllerDoLogin($request, $response, $container){
    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");

    $userModel = $container->users();

    $user = $userModel->login($email, $password);

    if($user) {
        // Guardar información en la sesión
        $response->setSession("user", $user);
        $response->setSession("logged", true);
        // Guardar id_role en la sesión si está presente en el resultado
        if (isset($user['id_role'])) {
            $response->setSession("id_role", $user['id_role']);
        }
        $response->redirect("location: index.php?r=compte");
    } else {
        $response->redirect("location: index.php?r=login");
    }

    return $response;
}
