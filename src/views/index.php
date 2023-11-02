<!DOCTYPE html>
<html lang="en">

<head>
    <title>ApartamentsFiguerencs</title>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php require "menu.php"; ?>
    
      <?php

        foreach($apartaments as $apartament) {
        
          ?>
          <div class="divapartaments">
          <div class="card">
                <img src="<?= $apartament["image_path"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $apartament["title"] ?></h5>
                  <h5 class="card-title preuapartament"><?= $apartament["price_day_low_season"] ?>€ / día</h5>
                  <p class="card-text"><?= $apartament["services_extra"] ?></p>
                  <p class="card-text"><?= $apartament["short_description"] ?></p>
                  <a href="index.php?r=infoapartaments&id=<?= $apartament["id_apartment"] ?>" class="btn btn-primary">Detalles de la oferta</a>
                </div>
              </div>
              </div>
        
      
<?php
        }

      ?>
    </div>
</body>

</html>