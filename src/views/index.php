<!DOCTYPE html>
<html lang="en">
<head>
    <title>ApartamentsFiguerencs</title>
    <?php require 'libs.php'; ?>
    <script src="js/scripts.js"></script>
</head>
<body>
    <?php require "menu.php"; ?>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner rounded">
        <?php $active = 'active'; ?>
        <?php foreach ($apartaments as $apartament) { ?>
            <div class="carousel-item <?= $active ?>">
                <img src="<?= $apartament["image_path_slider"] ?>" class="d-block" alt="Image for <?= $apartament["title"] ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?= $apartament["title"] ?></h1>
                    <p><?= $apartament["short_description"] ?></p>
                </div>
            </div>
            <?php $active = ''; ?>
        <?php } ?>
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

    <h1 class="sloganweb">Reserva el teu racó a Figueres, el teu apartament a la Costa Brava.</h1>

    <div class="container mt-5">
    <div class="divapartaments">
        <?php foreach ($apartaments as $apartament) { ?>
            <div class="card" id="card">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($images[$apartament['id_apartment']] as $key => $image) { ?>
                            <div class="carousel-item <?= $key === 0 ? 'active' : ''; ?>">
                                <img src="<?= $image['image_path']; ?>" class="d-block w-100" alt="Image <?= $key + 1 ?> for <?= $apartament['title'] ?>">
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#exampleModal" data-apartament-id="<?= $apartament['id_apartment']; ?>">
                    <h5 class="card-title"><?= $apartament["title"] ?></h5>
                    <p class="card-text"><?= $apartament["postal_address"] ?></p>
                    <p class="card-text"><?= $apartament["start_date"] . " - " . $apartament['end_date']; ?></p>
                    <?= $apartament['id_apartment']; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


    <?php require "footer.php"; ?>


    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
        
                </div>
            </div>
        </div>
    </div>






</body>
</html>
