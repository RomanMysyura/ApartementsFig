<?php
function controllerindex($request, $response, $container){

    $startDate = $request->get(INPUT_GET, "startDate");
    $endDate = $request->get(INPUT_GET, "endDate");
    $numRooms = $request->get(INPUT_GET, "numRooms");

    if (isset($startDate) && isset($endDate) && isset($numRooms)) {
        $apartaments = $container->apartaments()->getAllSearch($startDate, $endDate, $numRooms);
    } else {
        $apartaments = $container->apartaments()->getAll();
    }

    $season = $container->reserves()->getSeason();

    $images = [];

    $prices = [];

    foreach ($apartaments as $apartament) {
        $id = $apartament['id_apartment'];
        $apartmentImages = $container->apartaments()->getImage($id);
        $images[$id] = $apartmentImages;
        
        if ($apartament['start_date'] >= $season[0]['start_date'] && $apartament['end_date'] <= $season[0]['end_date']) {
            $price = $apartament['price_day_low_season'];
        } else if ($apartament['start_date'] >= $season[1]['start_date'] && $apartament['end_date'] <= $season[1]['end_date']) {
            $price = $apartament['price_day_high_season'];
        } else {
            $highSeasonDays = @max(0, min($apartament['start_date'], $season[1]['end_date']) - max($apartament['start_date'], $season[1]['start_date'])) + 1;
            $lowSeasonDays = @max(0, min($apartament['start_date'], $season[0]['end_date']) - max($apartament['start_date'], $season[1]['start_date'])) + 1;

            if ($highSeasonDays > $lowSeasonDays) {
                $price = $apartament['price_day_high_season'];
            } else {
                $price = $apartament['price_day_low_season'];
            }
        }

        $prices[$id] = $price;
    }

    $response->set("prices", $prices);

    $response->set("images", $images);

    $response->set("apartaments", $apartaments);

    $response->setTemplate("index.php");
    return $response;
}