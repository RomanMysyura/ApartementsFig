<?php
include '../src/models/ModelConnectBDD.php';

if (isset($_GET['id'])) {
    $apartmentId = $_GET['id'];

    $sql = "SELECT * FROM apartment WHERE id_apartment = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $apartmentId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $apartment = $stmt->fetch(PDO::FETCH_ASSOC);

        $apartmentData = array(
            'Nom' => $apartment['title'],
            'Adreça postal' => $apartment['postal_address'],
            'Longitud' => $apartment['length'],
            'Latitud' => $apartment['latitude'],
            'Descripció' => $apartment['short_description'],
            'Metres quadrats' => $apartment['square_metres'],
            'Número d\'habitacions' => $apartment['number_rooms'],
            'Serveis i extres' => $apartment['services_extra']
        );
    }

} else {
    echo "Falta el parámetro 'id' en la URL.";
}
?>
