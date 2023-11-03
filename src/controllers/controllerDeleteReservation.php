<?php
function controllerDeleteReservation($request, $response, $container) {
    $reservationId = $_POST['reservation_id']; 
    $container->reserves()->deleteReservation($reservationId);
    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}
