<?php
include '../src/models/ModelConnectBDD.php';


// Realiza una consulta a la base de datos para obtener los datos del usuario con nombre "Adrián"
$sql = "SELECT * FROM users WHERE name = 'Adrià'";
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
    </ul>';
} else {
    echo "No se encontró ningún usuario con el nombre 'Adrián' en la base de datos.";
}

?>
