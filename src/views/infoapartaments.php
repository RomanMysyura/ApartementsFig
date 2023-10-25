<?php include '../src/models/infoapartaments.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $apartment['title']; ?></title>
</head>
<body>
    <?php include '../src/views/menu.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="p-3">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded">
                            <?php $active = 'active'; ?>
                            <div class="carousel-item <?= $active ?>">
                                <img src="<?= $apartment["image_path"] ?>" class="d-block w-100" alt="Image for <?= $apartment["title"] ?>">
                            </div>
                            <?php $active = ''; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <ol class="list-group custom-list">
                        <?php foreach ($apartmentData as $label => $value): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold"><?= $label ?>:</div>
                                    <?= $value ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <div id="map" data-latitude="<?= $apartment['latitude']; ?>" data-longitude="<?= $apartment['length']; ?>"></div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
    <script>
        var apartmentId = <?= json_encode($apartmentId); ?>;
        var latitude = <?= json_encode($apartment['latitude']); ?>;
        var length = <?= json_encode($apartment['length']); ?>;
    </script>

    <script src="js/scripts.js"></script>
</body>
</html>

