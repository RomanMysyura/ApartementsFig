<script src="js/scripts.js"></script>
<?php
include '../src/models/ModelConnectBDD.php';

$user_id = $_COOKIE['user_id'];
// Realiza una consulta a la base de datos para obtener los datos del usuario con nombre "Adrián"
$sql = "SELECT * FROM users WHERE id_user = $user_id";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    $user = $result->fetch(PDO::FETCH_ASSOC);

    echo '
    <ul class="list-group list-group-flush rounded">
   <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
         <div class="fw-bold">Nom:</div>
         ' . $user["name"] . '
         <a id="mostrarFormulariName" class="">Editar</a>
      </div>
   </li>
   <form id="formulariName" method="post" action="" class="text-center" style="display: none;">
      <div class="mb-3">
         <label for="name" class="form-label text-white">Número de Tarjeta de Crédito</label>
         <input type="tel" class="form-control" id="name" name="name" placeholder="Nom" required>
      </div>
      <button type="submit" class="btn btn-primary">Editar tekefon mobil</button>
   </form>
   <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
         <div class="fw-bold">Cognoms:</div>
         ' . $user["last_name"] . '
         <a id="mostrarFormulariSurName" class="">Editar</a>
      </div>
   </li>
   <form id="formulariSurName" method="post" action="" class="text-center" style="display: none;">
      <div class="mb-3">
         <label for="last_name" class="form-label">Número de Tarjeta de Crédito</label>
         <input type="tel" class="form-control" id="last_name" name="last_name" placeholder="Cognom" required>
      </div>
      <button type="submit" class="btn btn-primary">Editar tekefon mobil</button>
   </form>
   <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
         <div class="fw-bold">Telèfon:</div>
         ' . $user["telephone"] . '
         <a id="mostrarFormulariTelephone" class="">Editar</a>
      </div>
   </li>
   <form id="formulariTelephone" method="post" action="" class="text-center" style="display: none;">
      <div class="mb-3">
         <label for="telephone" class="form-label">Número de Tarjeta de Crédito</label>
         <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="987654321" required>
      </div>
      <button type="submit" class="btn btn-primary">Editar tekefon mobil</button>
   </form>
   <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
         <div class="fw-bold">Correu Electrònic:</div>
         ' . $user["email"] . '
         <a id="mostrarFormulariEmail" class="">Editar</a>
      </div>
   </li>
   <form id="formulariEmail" method="post" action="" class="text-center" style="display: none;">
      <div class="mb-3">
         <label for="email" class="form-label">Número de Tarjeta de Crédito</label>
         <input type="text" class="form-control" id="email" name="email" placeholder="1234567891011121" required>
      </div>
      <button type="submit" class="btn btn-primary">Editar email</button>
   </form>
   <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
         <div class="fw-bold">Tarjeta de crèdit:</div>
         ' . $user["card_number"] . '
         <a id="mostrarFormulariCard" class="">Editar</a>
      </div>
   </li>
</ul>
<form id="formulariCard" method="post" action="" class="text-center" style="display: none;">
   <div class="mb-3">
      <label for="credit_card" class="form-label">Número de Tarjeta de Crédito</label>
      <input type="text" class="form-control" id="credit_card" name="credit_card" placeholder="1234567891011121" required>
   </div>
   <button type="submit" class="btn btn-primary">Editar tarjeta de crèdit</button>
</form>
';


} else {
    echo "No s'ha trobat l'usuari";
}

?>