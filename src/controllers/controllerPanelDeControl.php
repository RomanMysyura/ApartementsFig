<?php
function controllerPanelDeControl($request, $response, $container){
    $users = $container->users()->selectAllUsers();
    $apartments = $container->users()->selectAllApartments(); // Llama a la función para obtener los apartamentos

    $response->set("users", $users);
    $response->set("apartments", $apartments); // Proporciona los datos de los apartamentos
    $response->setTemplate("paneldecontrol.php");

    return $response;
}
