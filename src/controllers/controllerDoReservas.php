<?php
function controllerDoReservas($request, $response, $container) {
    try {
        if (isset($_SESSION["user"]["id_user"])) {
            $startDate = $request->get(INPUT_POST, "startDate");
            $endDate = $request->get(INPUT_POST, "endDate");
            $apartamentId = $request->get(INPUT_POST, "apartment_id");
            $priceDayHigh = $request->get(INPUT_POST, "high_price");
            $priceDayLow = $request->get(INPUT_POST, "low_price");
            $idUser = $_SESSION["user"]["id_user"];
            $state = "Pending";

            // Llama a la función calculateSeasonAndPrice para obtener idSeason y precio, incluyendo la obtención de apartamento y temporada
            $seasonAndPrice = calculateSeasonAndPrice($startDate, $endDate, $container, $priceDayHigh, $priceDayLow);
            $idSeason = $seasonAndPrice['idSeason'];
            $price = $seasonAndPrice['totalPrice'];

            var_dump($startDate, $endDate, $apartamentId, $idUser, $state, $idSeason, $price);

            if ($price === null) {
                echo "Price is still null!";
            }

            $container->reserves()->DoReservation($startDate, $endDate, $state, $price, $idUser, $apartamentId, $idSeason);

            $response->redirect("location: index.php?r=compte");
        } else {
            $response->redirect("location: index.php?r=login");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function calculateSeasonAndPrice($startDate, $endDate, $container, $priceDayHigh, $priceDayLow) {
    $Season = $container->reserves()->getSeason();

    $lowSeason = $Season[0];
    $highSeason = $Season[1];

    $currentDate = new DateTime($startDate);
    $endDateObj = new DateTime($endDate);

    $totalDays = 0;

    while ($currentDate <= $endDateObj) {
        $currentDateStr = $currentDate->format('Y-m-d');

        if ($currentDateStr >= $highSeason['start_date'] && $currentDateStr <= $highSeason['end_date']) {
            $currentSeasonId = 2;
        } elseif ($currentDateStr >= $lowSeason['start_date'] && $currentDateStr <= $lowSeason['end_date']) {
            $currentSeasonId = 1;
        } else {
            $highSeasonDays = max(0, min($currentDateStr, $highSeason['end_date']) - max($currentDateStr, $highSeason['start_date'])) + 1;
            $lowSeasonDays = max(0, min($currentDateStr, $lowSeason['end_date']) - max($currentDateStr, $lowSeason['start_date'])) + 1;

            if ($highSeasonDays > $lowSeasonDays) {
                $currentSeasonId = 2;
            } else {
                $currentSeasonId = 1;
            }
        }

        $totalDays++; // Incrementa el contador de días

        $currentDate->modify('+1 day');
    }

    if ($currentSeasonId == 1) {
        $pricePerDay = $priceDayLow;
    } else {
        $pricePerDay = $priceDayHigh;
    }

    $totalPrice = $totalDays * $pricePerDay;

    return ['idSeason' => $currentSeasonId, 'totalPrice' => $totalPrice];
}
