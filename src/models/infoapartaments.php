<?php
include '../src/models/ModelConnectBDD.php';

if (isset($_GET['id'])) {
    $apartmentId = $_GET['id'];

    // Consulta SQL para obtener información del apartamento por ID
    $sql = "SELECT * FROM apartment WHERE id_apartment = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $apartmentId, PDO::PARAM_INT);
    $stmt->execute();

    

    if ($stmt->rowCount() > 0) {
        $apartment = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">';

        $active = 'active';

        // Muestra las imágenes del apartamento utilizando los datos de la consulta SQL
        echo '<div class="carousel-item ' . $active . '">
            <img src="' . $apartment["image_path"] . '" class="d-block w-100" alt="Image for ' . $apartment["title"] . '">
            <div class="carousel-caption d-none d-md-block">
                <h5>' . $apartment["title"] . '</h5>
                <p>' . $apartment["short_description"] . '</p>
            </div>
        </div>';

        echo '</div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>';

        echo '<ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Nom:</div>';
        echo $apartment['title']; 
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Adreça postal:</div>';
        echo $apartment['postal_address'];
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Longitud:</div>';
        echo $apartment['length'];
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Latitud:</div>';
        echo $apartment['latitude'];
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Descripció:</div>';
        echo $apartment['short_description'];
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Metres quadrats:</div>';
        echo $apartment['square_metres'];
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Número d\'habitacions:</div>';
        echo $apartment['number_rooms'];
        echo '</div>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Serveis i extres:</div>';
        echo $apartment['services_extres'];
        echo '</div>
            </li>
        </ol>';

    } else {
        echo "No se encontró información para el apartamento con ID $apartmentId";
    }
} else {
    echo "Falta el parámetro 'id' en la URL.";
}
?>
