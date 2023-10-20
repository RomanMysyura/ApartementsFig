<?php
function controllerMenu($request, $response, $container){

    $response->setTemplate("menu.php");

    return $response;
}