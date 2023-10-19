<?php
include '../src/models/ModelConnectBDD.php';

echo '<div class="divapartaments">';

// Realiza una consulta a la base de datos para obtener los apartamentos
$sql = "SELECT * FROM apartment";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="card">
            <img src="'. $row["image_path"].' " class="card-img-top" alt="...">
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
    echo "No se encontraron apartamentos en la base de datos.";
}

echo '</div>';