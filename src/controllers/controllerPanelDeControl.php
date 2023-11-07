<?php
function controllerPanelDeControl($request, $response, $container) {
    
    $idRole = isset($_SESSION['id_role']) ? $_SESSION['id_role'] : null;

   
    if ($idRole === null || ($idRole !== 2 && $idRole !== 3)) {
        
        $response->redirect("location: index.php?r= ");
        return $response;
    }

    $users = $container->users()->selectAllUsers();
    $apartments = $container->apartaments()->selectAllApartments();
    $reservations = $container->reserves()->getAllReservations(); 
    $seasons = $container->reserves()->getSeason();

    $response->set("users", $users);
    $response->set("apartments", $apartments);
    $response->set("reservations", $reservations);
    $response->set("seasons", $seasons);

    $response->setTemplate("paneldecontrol.php");

    return $response;
}
