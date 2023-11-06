<!DOCTYPE html>
<html lang="en">
<head>
    <title>ApartamentsFiguerencs</title>
    <?php require 'libs.php'; ?>
    <script src="js/scripts.js"></script>

</head>
<body>
    <?php require "menu.php"; ?>

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






</body>


</html>
