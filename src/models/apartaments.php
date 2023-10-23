<?php
include '../src/models/ModelConnectBDD.php';
include '../src/models/menu_search.php';

echo '<div class="divapartaments">';

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Muestra los resultados de la búsqueda
            // Puedes mantener la estructura de tu tarjeta como está
            echo '<div class="card">
                <img src="'. $row["image_path"] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $row["title"] . '</h5>
                    <h5 class="card-title preuapartament">' . $row["price_day_low_season"] . '€ / dia</h5>
                    <p class="card-text">' . $row["services_extra"] . '</p>
                    <p class="card-text">' . $row["short_description"] . '</p>
                    <a href="index.php?r=infoapartaments&id=' . $row["id_apartment"] . '" class="btn btn-primary">Detalles de la oferta</a>
                </div>
            </div>';
        }
    } else {
        echo "No se han encontrado apartamentos para la dirección: " . $address;
    }
} else {
    // Si no se ha enviado una búsqueda, muestra todos los apartamentos
    $sql = "SELECT * FROM apartment";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Muestra todos los apartamentos
            // Puedes mantener la estructura de tu tarjeta como está
            echo '<div class="card">
                <img src="'. $row["image_path"] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $row["title"] . '</h5>
                    <h5 class="card-title preuapartament">' . $row["price_day_low_season"] . '€ / dia</h5>
                    <p class="card-text">' . $row["services_extra"] . '</p>
                    <p class="card-text">' . $row["short_description"] . '</p>
                    <a href="index.php?r=infoapartaments&id=' . $row["id_apartment"] . '" class="btn btn-primary">Detalles de la oferta</a>
                </div>
            </div>';
        }
    } else {
        echo "No se han encontrado apartamentos";
    }
}

echo '</div>';
?>
