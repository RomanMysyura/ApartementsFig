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
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Cognoms:</div>
                ' . $user["last_name"] . '
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Telèfon:</div>
                ' . $user["telephone"] . '
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Correu Electrònic:</div>
                ' . $user["email"] . '
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Tarjeta de crèdit:</div>
                ' . $user["card_number"] . '
            </div>
        </li>
    </ul>
    <form method="post" action="" class="text-center">
        <div class="mb-3">
            <label for="credit_card" class="form-label">Número de Tarjeta de Crédito</label>
            <input type="text" class="form-control" id="credit_card" name="credit_card" placeholder="1234567891011121" required>
        </div>
        <button type="submit" class="btn btn-primary">Afegir tarjeta de crèdit</button>
    </form>';
} else {
    echo "No se encontró ningún usuario con el nombre 'Adrián' en la base de datos.";
}

?>
