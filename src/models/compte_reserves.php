<?php
include '../src/models/ModelConnectBDD.php';

$user_id = $_COOKIE['user_id'];

$sql = "SELECT r.* FROM reservation r INNER JOIN users u ON r.id_user = u.id_user WHERE u.id_user = $user_id";

$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $accordionTitle = "Reserva #" . $row['id_reserved'];

        echo '<div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading' . $row['id_reserved'] . '">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $row['id_reserved'] . '" aria-expanded="true" aria-controls="collapse' . $row['id_reserved'] . '">
                            ' . $accordionTitle . '
                        </button>
                    </h2>
                    <div id="collapse' . $row['id_reserved'] . '" class="accordion-collapse collapse show" aria-labelledby="heading' . $row['id_reserved'] . '" data-bs-parent="#reservationsAccordion">
                        <div class="accordion-body">
                            <strong>ID Reserva:</strong> ' . $row['id_reserved'] . '<br>
                            <strong>Fecha de Entrada:</strong> ' . $row['entry_date'] . '<br>
                            <strong>Fecha de Salida:</strong> ' . $row['output_date'] . '<br>
                            <strong>Estado:</strong> ' . $row['state'] . '<br>
                            <strong>Precio:</strong> ' . $row['price'] . '<br>
                        </div>
                    </div>
                </div>
            </div>';

    }
} else {
    echo "No s'han trobat reserves.";
}
?>