<?php
function controllerlogin($request, $response, $container){
    
    $response->setTemplate("login.php");

    return $response;
    
}
