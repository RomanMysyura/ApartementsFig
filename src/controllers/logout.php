<?php
function controllerlogout($request, $response, $container){
    
    $response->setTemplate("logout.php");

    return $response;
   
}