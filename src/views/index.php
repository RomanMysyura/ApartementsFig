<?php include '../src/models/apartaments.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ApartamentsFiguerencs</title>
  <script src="js/scripts.js"></script>
</head>
<body>
  <?php require "menu.php"; ?>
  <h3 class="text-center texttitol">Millor que a casa</h3>
  <?php include '../src/models/carrusel.php'; ?>
  <h3 class="text-center texttitol">Els nostres apartaments</h3>

  <div class="divapartaments">
    <?php if ($stmt->rowCount() > 0): ?>
      <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="card">
          <img src="<?= $row["image_path"] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $row["title"] ?></h5>
            <h5 class="card-title preuapartament"><?= $row["price_day_low_season"] ?>€ / día</h5>
            <p class="card-text"><?= $row["services_extra"] ?></p>
            <p class="card-text"><?= $row["short_description"] ?></p>
            <a href="index.php?r=infoapartaments&id=<?= $row["id_apartment"] ?>" class="btn btn-primary">Detalles de la oferta</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      No se han encontrado apartamentos para la dirección: <?= $address ?>
    <?php endif; ?>
  </div>

  <div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
  </div>
</body>
</html>
