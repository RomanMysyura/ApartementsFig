<?php
function controllerCompte($request, $response, $container){
    $users = $container->users()->selectUser($_SESSION["user"]["id_user"]);
    $reservations = $container->users()->selectReservation($_SESSION["user"]["id_user"]);
   
    $response->set("users", $users);
    $response->set("reservations", $reservations);
    $response->setTemplate("compte.php");

    return $response;
   
}