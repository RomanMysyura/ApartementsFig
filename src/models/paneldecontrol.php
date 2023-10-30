<?php
// Incluir el archivo de conexión a la base de datos
include '../src/models/ModelConnectBDD.php';

// Función para eliminar un usuario
function eliminarUsuari($conn, $user_id) {
    $sql = "DELETE FROM users WHERE id_user = :user_id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Verificar si se ha enviado una solicitud POST para eliminar un usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    if (eliminarUsuari($conn, $user_id)) {
        echo '<h1 class="usuarieliminat">'."Usuari s'ha eliminat correctament".'</h1>';
    } else {
        echo '<h1 class="usuarieliminat">'."ERROR".'</h1>';
    }
}

// Realizar la consulta SQL para seleccionar todos los datos de la tabla users
$sql = "SELECT * FROM users";

try {
    $stmt = $conn->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error al consultar la base de datos: ' . $e->getMessage();
}

$sql = "SELECT * FROM apartment";

try {
    $stmt = $conn->query($sql);
    $apartments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error al consultar la base de datos: ' . $e->getMessage();
}







if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apartment_id'])) {
    $apartment_id = $_POST['apartment_id'];

    // Recoge los datos actualizados del formulario
    $title = $_POST['title'];
    $postal_address = $_POST['postal_address'];
    $length = $_POST['length'];
    $latitude = $_POST['latitude'];
    $short_description = $_POST['short_description'];
    $square_metres = $_POST['square_metres'];
    $number_rooms = $_POST['number_rooms'];
    $services_extra = $_POST['services_extra'];
    $price_day_low_season = $_POST['price_day_low_season'];
    $price_day_high_season = $_POST['price_day_high_season'];

    // Actualiza los datos en la base de datos
    $sql = "UPDATE apartment SET
            title = :title,
            postal_address = :postal_address,
            length = :length,
            latitude = :latitude,
            short_description = :short_description,
            square_metres = :square_metres,
            number_rooms = :number_rooms,
            services_extra = :services_extra,
            price_day_low_season = :price_day_low_season,
            price_day_high_season = :price_day_high_season
            WHERE id_apartment = :apartment_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':postal_address', $postal_address, PDO::PARAM_STR);
    $stmt->bindParam(':length', $length, PDO::PARAM_STR);
    $stmt->bindParam(':latitude', $latitude, PDO::PARAM_STR);
    $stmt->bindParam(':short_description', $short_description, PDO::PARAM_STR);
    $stmt->bindParam(':square_metres', $square_metres, PDO::PARAM_STR);
    $stmt->bindParam(':number_rooms', $number_rooms, PDO::PARAM_INT);
    $stmt->bindParam(':services_extra', $services_extra, PDO::PARAM_STR);
    $stmt->bindParam(':price_day_low_season', $price_day_low_season, PDO::PARAM_STR);
    $stmt->bindParam(':price_day_high_season', $price_day_high_season, PDO::PARAM_STR);
    $stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Los datos se han actualizado correctamentefgd
        // header("Location: index.php?r=paneldecontrol");
        // exit;
    } else {
        
    }
}


?>



