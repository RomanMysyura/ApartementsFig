<script src="js/scripts.js"></script>
<?php
include '../src/models/ModelConnectBDD.php';

$user_id = $_SESSION['user_id']; // Obtiene el user_id de la sesión

// Realiza una consulta a la base de datos para obtener los datos del usuario con el user_id
$sql = "SELECT * FROM users WHERE id_user = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '
    <ul class="list-group list-group-flush rounded">
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ms-2">
                    <div class="fw-bold">Nom:</div>
                    ' . $user["name"] . '
                </div>
                <a id="mostrarFormulariName" class="float-end"> <button class="btneditar btn-settings">Editar</button></a>
            </div>
        </li>
   
        <form id="formulariName" method="post" action="" class="text-center" style="display: none;">
            <div class="mb-3">
                <label for="name" class="form-label text-white"></label>
                <input type="tel" class="texteditdades" id="name" name="name" placeholder="Nom" required>
            </div>
            <button type="submit" class="confirmaredit">Confirmar</button>
        </form>
        
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ms-2">
                    <div class="fw-bold">Cognoms:</div>
                    ' . $user["last_name"] . '
                </div>
                <a id="mostrarFormulariSurName" class="float-end"> <button class="btneditar btn-settings">Editar</button></a>
                
            </div>
        </li>
        <form id="formulariSurName" method="post" action="" class="text-center" style="display: none;">
            <div class="mb-3">
                <label for="last_name" class="form-label"></label>
                <input type="tel" class="texteditdades" id="last_name" name="last_name" placeholder="Cognom" required>
            </div>
            <button type="submit" class="confirmaredit">Confirmar</button>
        </form>
        
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ms-2">
                    <div class="fw-bold">Telèfon:</div>
                    ' . $user["telephone"] . '
                </div>
                <a id="mostrarFormulariTelephone" class="float-end"> <button class="btneditar btn-settings">Editar</button></a>
            </div>
        </li>
        <form id="formulariTelephone" method="post" action="" class="text-center" style="display: none;">
            <div class="mb-3">
                <label for="telephone" class="form-label"></label>
                <input type="tel" class="texteditdades" id="telephone" name="telephone" placeholder="987654321" required>
            </div>
            <button type="submit" class="confirmaredit">Confirmar</button>
        </form>
        
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ms-2">
                    <div class="fw-bold">Correu Electrònic:</div>
                    ' . $user["email"] . '
                </div>
                <a id="mostrarFormulariEmail" class="float-end"> <button class="btneditar btn-settings">Editar</button></a>
            </div>
        </li>
        <form id="formulariEmail" method="post" action="" class="text-center" style="display: none;">
            <div class="mb-3">
                <label for "email" class="form-label"></label>
                <input type="text" class="texteditdades" id="email" name="email" placeholder="1234567891011121" required>
            </div>
            <button type="submit" class="confirmaredit">Confirmar</button>
        </form>
        
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ms-2">
                    <div class="fw-bold">Tarjeta de crèdit:</div>
                    ' . $user["card_number"] . '
                </div>
                <a id="mostrarFormulariCard" class="float-end"> <button class="btneditar btn-settings">Editar</button></a>
            </div>
        </li>
    </ul>
    <form id="formulariCard" method="post" action="" class="text-center" style="display: none;">
        <div class="mb-3">
            <label for="credit_card" class="form-label"></label>
            <input type="text" class="texteditdades" id="credit_card" name="credit_card" placeholder="1234567891011121" required>
        </div>
        <button type="submit" class="confirmaredit">Confirmar</button>
    </form>
    ';

} else {
    echo "No s'ha trobat l'usuari";
}
?>
