<?php
function controllerreservar($request, $response, $container){
    
    $response->setTemplate("reservar.php");

    return $response;
    
}