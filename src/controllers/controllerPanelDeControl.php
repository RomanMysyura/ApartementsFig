<?php
function controllerPanelDeControl($request, $response, $container){
    $users = $container->users()->selectAllUsers();
    $apartments = $container->apartaments()->selectAllApartments();
    $reservations = $container->reserves()->getAllReservations(); // Obtener datos de reservas

    $response->set("users", $users);
    $response->set("apartments", $apartments);
    $response->set("reservations", $reservations); // Pasar datos de reservas a la vista
    $response->setTemplate("paneldecontrol.php");

    return $response;
}
