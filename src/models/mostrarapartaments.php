
<?php
include '../src/models/ModelConnectBDD.php';
$query = "SELECT * FROM apartment";
$result = $conn->query($query);
  // Recorre los resultados de la consulta y muestra un botón para cada apartamento
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Modal para mostrar la información del apartamento
    echo '<div class="modal fade" id="apartmentModal' . $row['id_apartment'] . '" tabindex="-1" role="dialog" aria-labelledby="apartmentModalLabel' . $row['id_apartment'] . '" aria-hidden="true">';
    echo '<div class="modal-dialog modal-lg" role="document">'; // Agregar la clase modal-lg para el ancho del 80%
    echo '<div class="modal-content">';
    
    echo '<div class="modal-body">';
    
    // Agrega la imagen del apartamento
    
    echo '<img src="' . $row['image_path'] . '" class="card-img-top imgmodal" alt="Imagen del apartamento">';
    
    echo '<p class="preu">'. $row['title'] ." - " . $row["price_day_low_season"] .'€ / nit </p>';
    echo '<p class="servicesextra">' . $row['services_extra'] . '</p>'; 
    echo '<p class="descripcioapartmenttitol">' . "Descripció:". '</p>';
    
    echo '<p class="descripcioapartment">' . $row['short_description'] . '</p>';
    echo '<p class="descripcioapartment">' . $row['square_metres'] .' Metres quadrats'. '</p>';
    echo '<p class="descripcioapartment">' . $row['number_rooms'] .' Habitacions'. '</p>';
    echo '<p class="descripcioapartment">' ."Adreça: ". $row['postal_address'] . '</p>';
   
    echo '</div>';

    
    echo '<div class="modal-footer">';
    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>

