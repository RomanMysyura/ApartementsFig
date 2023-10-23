<?php
function controllerdashboard($request, $response, $container){
    
    $response->setTemplate("dashboard.php");

    return $response;
    
}