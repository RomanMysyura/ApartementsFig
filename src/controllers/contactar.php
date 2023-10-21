<?php
function controllercontactar($request, $response, $container){
    
    $response->setTemplate("contactar.php");

    return $response;
    
}