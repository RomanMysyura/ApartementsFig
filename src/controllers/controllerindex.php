<?php
function controllerIndex($request, $response, $container){

    // Obtenim els valors del buscador
    $startDate = $request->get(INPUT_GET, "startDate");
    $endDate = $request->get(INPUT_GET, "endDate");
    $numRooms = $request->get(INPUT_GET, "numRooms");

    // Si s'han entrat tots els parametres en el buscador...
    if (isset($startDate) && isset($endDate) && isset($numRooms)) {

        // Fa un select dels apartaments a partir dels valors
        $apartaments = $container->apartaments()->getAllSearch($startDate, $endDate, $numRooms);
    } else {

        // Mostra tots els apartaments
        $apartaments = $container->apartaments()->getAll();
    }

    // Obtenim les sessions
    $seasons = $container->reserves()->getSeason();

    // Declarem un array per a les imatges i els preus
    $images = [];
    $prices = [];

    // Per cada apartament...
    foreach ($apartaments as $apartament) {

        // Obtenim l'id
        $id = $apartament['id_apartment'];

        // Fem un select per obtenir les imatges de cada apartament
        $apartmentImages = $container->apartaments()->getImage($id);

        // Guardem les images del apartaments a partir de la id en un array associatiu
        $images[$id] = $apartmentImages;

        // Declarem les variables amb DateTime per poder manipular-les
        $lowSeasonStartDate = new DateTime($seasons[0]['start_date']);
        $lowSeasonEndDate = new DateTime($seasons[0]['end_date']);
        $highSeasonStartDate = new DateTime($seasons[1]['start_date']);
        $highSeasonEndDate = new DateTime($seasons[1]['end_date']);
        $apartamentStartDate = new DateTime($apartament['start_date']);
        $apartamentEndDate = new DateTime($apartament['end_date']);

        // Obtenim el preu del apartament per dia
        $apartamentPriceDayLow = $apartament['price_day_low_season'];
        $apartamentPriceDayHigh = $apartament['price_day_high_season'];
        
        // Comprovem el preu per dia del apartament a partir de la seva temporada
        if ($apartamentStartDate >= $lowSeasonStartDate && $apartamentEndDate <= $lowSeasonEndDate) {
            $price = $apartamentPriceDayLow;
        } else if ($apartamentStartDate >= $highSeasonStartDate && $apartamentEndDate <= $highSeasonEndDate) {
            $price = $apartamentPriceDayHigh;
        } else {
            $daysLowSeason = $apartamentStartDate->diff($lowSeasonEndDate)->days;
            $daysHighSeason = $highSeasonStartDate->diff($apartamentEndDate)->days;

            if ($daysHighSeason > $daysLowSeason) {
                $price = $apartamentPriceDayHigh;
            } else {
                $price = $apartamentPriceDayLow;
            }
        }

        // Guardem el preu de cada apartament en un array associatiu
        $prices[$id] = $price;
    }

    // Definim les variables per utilitzar a la view
    $response->set("prices", $prices);
    $response->set("images", $images);
    $response->set("apartaments", $apartaments);

    // Definim la plantilla
    $response->setTemplate("index.php");
    return $response;
}