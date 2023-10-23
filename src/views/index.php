<!DOCTYPE html>
<html lang="en">
<head>
  <title>ApartamentsFiguerencs</title>
  <script src="js/scripts.js"></script>
</head>
<body>
  <?php require "menu.php";?>
  <h3 class="text-center texttitol">Millor que a casa</h3>
  <?php include '../src/models/carrusel.php';?>
  <h3 class="text-center texttitol">Els nostres apartaments</h3>
  <?php include '../src/models/apartaments.php'; ?>
</body>
</html>
