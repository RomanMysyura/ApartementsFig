<?php
function controllerDoRegister($request, $response, $container){
 
    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $telephone = $request->get(INPUT_POST, "telephone");
    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");
   
    $userModel = $container->users();
    $userModel = $userModel->register($name, $last_name, $telephone, $email, $password);
    $response->redirect("location: index.php?r=compte");
}
