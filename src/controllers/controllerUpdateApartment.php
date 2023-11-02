<?php
function controllerUpdateApartment($request, $response, $container){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtén los datos del formulario
        $apartmentId = $_POST["apartment_id"];
        $title = $_POST["title"];
        $postalAddress = $_POST["postal_address"];
        $length = $_POST["length"];
        $latitude = $_POST["latitude"];
        $shortDescription = $_POST["short_description"];
        $squareMetres = $_POST["square_metres"];
        $numberRooms = $_POST["number_rooms"];
        $servicesExtra = $_POST["services_extra"];
        $priceLowSeason = $_POST["price_day_low_season"];
        $priceHighSeason = $_POST["price_day_high_season"];

        // Ejecuta la consulta SQL para actualizar el apartamento
        $container->apartaments()->updateApartment(
            $apartmentId,
            $title,
            $postalAddress,
            $length,
            $latitude,
            $shortDescription,
            $squareMetres,
            $numberRooms,
            $servicesExtra,
            $priceLowSeason,
            $priceHighSeason
        );
    }

    // Redirige de nuevo al panel de control
    $response->redirect("location: index.php?r=paneldecontrol");
    return $response;
}
