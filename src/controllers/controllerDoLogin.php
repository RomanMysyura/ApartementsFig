<?php
function controllerDoLogin($request, $response, $container){

    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");
    

    $userModel = $container->users();

    $userModel = $userModel->login($email, $password);
    
    if($userModel) {
        $response->setSession("user", $userModel);
        $response->setSession("logged", true);
        $response->redirect("location: index.php?r=compte"); //dsf

        

    } else {
        $response->redirect("location: index.php?r=login");
    }

    return $response;
}