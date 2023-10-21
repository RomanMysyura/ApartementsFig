<?php
function controllerindex($request, $response, $container){
    
    $response->setTemplate("index.php");

    return $response;
}