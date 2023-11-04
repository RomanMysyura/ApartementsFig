<?php
function controllerUpdateReservation($request, $response, $container) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reservationId = $_POST['reservation_id'];
        $entryDate = $_POST['entry_date'];
        $outputDate = $_POST['output_date'];
        $state = $_POST['state'];

        // Aquí debes agregar la lógica para actualizar la reserva en la base de datos
        $container->reserves()->updateReservation($reservationId, $entryDate, $outputDate, $state);

        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;
    }
}
