<?php
include '../src/models/ModelConnectBDD.php';

if (isset($_GET['id'])) {
    $apartmentId = $_GET['id'];

    // Consulta SQL para obtener información del departamento por ID
    $sql = "SELECT * FROM apartment WHERE id_apartment = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $apartmentId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $apartment = $stmt->fetch(PDO::FETCH_ASSOC);

        // Aquí puedes mostrar la información detallada del departamento
        // Por ejemplo:
        echo '<h1>' . $apartment['title'] . '</h1>';
        echo '<p>Precio por día: ' . $apartment['price_day_low_season'] . '€</p>';
        echo '<p>Descripción: ' . $apartment['description'] . '</p>';
        // ... y así sucesivamente.

    } else {
        echo "No se encontró información para el apartamento con ID $apartmentId";
    }
} else {
    echo "Falta el parámetro 'id' en la URL.";
}
?>