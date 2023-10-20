<?php
function controllercompte($request, $response, $container){
    $response->setTemplate("compte.php");

    return $response;
   
}