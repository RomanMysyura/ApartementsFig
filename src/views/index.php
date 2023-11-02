<!DOCTYPE html>
<html lang="en">
<head>
    <title>ApartamentsFiguerencs</title>
    <script src="js/scripts.js"></script>
</head>
<body>
    <?php require "menu.php"; ?>
    <div class="divapartaments">
        <?php foreach ($apartaments as $apartament) { ?>
            <div class="card">
                <img src="<?= $apartament["image_path"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $apartament["title"] ?></h5>
                    <h5 class="card-title preuapartament"><?= $apartament["price_day_low_season"] ?>€ / día</h5>
                    <p class="card-text"><?= $apartament["services_extra"] ?></p>
                    <p class="card-text"><?= $apartament["short_description"] ?></p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apartmentModal<?= $apartament["id_apartment"] ?>">Detalles de la oferta</button>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php foreach ($apartaments as $apartament) { ?>
    <div class="modal fade" id="apartmentModal<?= $apartament['id_apartment'] ?>" tabindex="-1" role="dialog" aria-labelledby="apartmentModalLabel<?= $apartament['id_apartment'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded">
                            <?php $active = 'active'; ?>
                            <div class="carousel-item <?= $active ?>">
                                <img src="<?= $apartament["image_path"] ?>" class="d-block w-100" alt="Image for <?= $apartament["title"] ?>">
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
                    <ol class="list-group rounded-0 mt-3">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Nom:</div>
                                <?php echo $apartament["title"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Codi Postal:</div>
                                <?php echo $apartament["postal_address"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Longitud:</div>
                                <?php echo $apartament["length"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Latitud:</div>
                                <?php echo $apartament["latitude"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Descripció:</div>
                                <?php echo $apartament["short_description"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Metres quadrats:</div>
                                <?php echo $apartament["square_metres"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Número d'habitacions:</div>
                                <?php echo $apartament["number_rooms"]; ?>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Serveis i extres:</div>
                                <?php echo $apartament["services_extra"]; ?>
                            </div>
                        </li>
                    </ol>
                    <div id="map" data-latitude="<?= $apartment['latitude']; ?>" data-longitude="<?= $apartment['length']; ?>" class="mt-3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>
