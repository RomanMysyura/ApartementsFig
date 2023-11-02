<?php
function controllercontactar($request, $response, $container){
    $users = $container->users()->selectAllUsers();

    $response->set("users", $users);
    $response->setTemplate("paneldecontrol.php");

    return $response;
    
}