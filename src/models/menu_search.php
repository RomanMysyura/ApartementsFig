<?php 
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../src/models/ModelConnectBDD.php';

    // Recupera los datos del formulario
    $address = $_POST['address'];
    $numRooms = $_POST['numRooms'];

    // Construye la consulta SQL para buscar apartamentos
    if (!empty($address) && !empty($numRooms)) {
        // Si ambos parámetros están presentes, busca a partir de ambos
        $sql = "SELECT * FROM apartment WHERE postal_address = :address AND number_rooms = :numRooms";
    } else if (!empty($address)) {
        // Si solo se proporciona la dirección, busca a partir de la dirección
        $sql = "SELECT * FROM apartment WHERE postal_address = :address";
    } else if (!empty($numRooms)) {
        // Si solo se proporciona el número de habitaciones, busca a partir del número de habitaciones
        $sql = "SELECT * FROM apartment WHERE number_rooms = :numRooms";
    }

    $stmt = $conn->prepare($sql);

    if (!empty($address)) {
        $stmt->bindParam(":address", $address);
    }

    if (!empty($numRooms)) {
        $stmt->bindParam(":numRooms", $numRooms);
    }

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $error_message = "Error en la consulta: " . $e->getMessage();
    }
}
?>
