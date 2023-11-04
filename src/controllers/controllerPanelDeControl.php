<?php
function controllerPanelDeControl($request, $response, $container) {
    // Obtenim el valor del role del usuari
    $idRole = isset($_SESSION['id_role']) ? $_SESSION['id_role'] : null;

    // Verificar si el usuario tiene un id_role igual a 2
    if ($idRole !== 2) {
        // Redirigir a otra página o mostrar un mensaje de error
        $response->redirect("location: index.php?r= ");
        return $response;
    }

 
    $users = $container->users()->selectAllUsers();
    $apartments = $container->apartaments()->selectAllApartments();
    $reservations = $container->reserves()->getAllReservations(); // Obtener datos de reservas

    $response->set("users", $users);
    $response->set("apartments", $apartments);
    $response->set("reservations", $reservations); // Pasar datos de reservas a la vista
    $response->setTemplate("paneldecontrol.php");

    return $response;
}
