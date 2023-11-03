<?php
function controllerAddApartment($request, $response, $container) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtén los datos del formulario
        $title = $_POST['title'];
        $postal_address = $_POST['postal_address'];
        $length = $_POST['length'];
        $latitude = $_POST['latitude'];
        $short_description = $_POST['short_description'];
        $square_metres = $_POST['square_metres'];
        $number_rooms = $_POST['number_rooms'];
        $services_extra = $_POST['services_extra'];
        $price_day_low_season = $_POST['price_day_low_season'];
        $price_day_high_season = $_POST['price_day_high_season'];

        // Llama a la función para agregar el nuevo apartamento
        $container->apartaments()->addApartment($title, $postal_address, $length, $latitude, $short_description, $square_metres, $number_rooms, $services_extra, $price_day_low_season, $price_day_high_season);

        // Redirige de nuevo al panel de control
        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;
    }
}
