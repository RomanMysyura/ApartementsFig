<?php
include '../src/models/ModelConnectBDD.php';

$sql = "SELECT * FROM apartment";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    echo '<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">';

    $active = 'active';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="carousel-item ' . $active . '">
            <img src="' . $row["image_path"] . '" class="d-block w-100" alt="Image for ' . $row["title"] . '">
            <div class="carousel-caption d-none d-md-block">
                <h5>' . $row["title"] . '</h5>
                <p>' . $row["short_description"] . '</p>
            </div>
        </div>';
        $active = '';
    }

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
} else {
    echo "No s'han trobat apartaments";
}
?>
