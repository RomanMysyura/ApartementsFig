<?php
function controllerInfoApartamentAjax($request, $response, $container) {
    $apartamentId = $_GET['apartament_id'];

    // Obtén la información del apartamento desde tu modelo (models/apartaments.php)
    $apartamentInfo = $container->apartaments()->getApartamentInfoById($apartamentId);

    $season = $container->reserves()->getSeason();

    // Configura la respuesta como JSON
    $response->setJSON();

    if (!empty($apartamentInfo)) {
        // Establece los valores que deseas enviar como JSON
        $response->values = [
            'apartament' => $apartamentInfo,
            'season' => $season,
        ];    
    } else {
        // En caso de que no se encuentren datos del apartamento, puedes configurar un mensaje de error
        $response->values = ['error' => 'Apartamento no encontrado'];
    }

    return $response;
}
