<?php
function controllerRegister($request, $response, $container){

  
    $response->setTemplate("signup.php");

    return $response;
}


