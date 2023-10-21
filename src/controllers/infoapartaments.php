<?php
function controllerinfoapartaments($request, $response, $container){
    
    $response->setTemplate("infoapartaments.php");
    
    return $response;
}