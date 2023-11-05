<!DOCTYPE html>
<html lang="en">
<head>
    <title>ApartamentsFiguerencs</title>
    <script src="js/scripts.js"></script>
</head>
<body>
    
    <?php require "menu.php"; ?>


    <h1 class="sloganweb">Reserva el teu racó a Figueres, el teu apartament a la Costa Brava.</h1>

    <div class="container mt-5">
    <div class="divapartaments">
        <?php foreach ($apartaments as $apartament) { ?>
            <div class="card" id="card">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= $apartament['image_path'];?>" class="d-block w-100" alt="Image for <?= $apartament["title"] ?>">    
                        </div>
                    </div>
                </div>
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#apartmentModal<?= $apartament['id_apartment'] ?>">
                    <h5 class="card-title"><?= $apartament["title"] ?></h5>
                    <p class="card-text"><?= $apartament["postal_address"] ?></p>
                    <p class="card-text"><?= $apartament["start_date"] . " - " . $apartament['end_date']; ?></p>
                    
                </div>
            </div>
        <?php } ?>
    </div>
    </div>


    <?php foreach ($apartaments as $apartament) { ?>
    <div class="modal fade" id="apartmentModal<?= $apartament['id_apartment'] ?>" tabindex="-1" role="dialog" aria-labelledby="apartmentModalLabel<?= $apartament['id_apartment'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
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
                <form class="d-lg-flex collapse text-center mb-0" id="DoReservation" method="POST">
                        <div class="form-group me-2 my-3">
                            <input class="form-control" type="date" id="startDate" name="startDate"/>
                        </div>
                        <div class="form-group me-2 my-3">
                            <input class="form-control" type="date" id="endDate" name="endDate"/>
                        </div>
                        <div class="form-group me-2 my-3">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php require "footer.php"; ?>
</body>
</html>
