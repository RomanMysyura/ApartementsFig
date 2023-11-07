<?php
function controllerUpdateSeason($request, $response, $container) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['season_id'])) {
            $seasonId = $_POST['season_id'];
            $name = $_POST['name'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            
            // Llama a la función para actualizar la temporada en la base de datos
            $container->reserves()->updateSeason($seasonId, $name, $start_date, $end_date);
    
            // Redirige a la página de control
            $response->redirect("location: index.php?r=paneldecontrol");
            return $response;
        }
    }
}
