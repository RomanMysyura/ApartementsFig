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
    
    $response->set("apartaments", $apartaments);

    $response->setTemplate("index.php");
    return $response;
}