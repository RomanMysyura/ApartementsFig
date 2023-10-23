<?php 
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../src/models/ModelConnectBDD.php';

    // Recupera los datos del formulario
    $address = $_POST['address'];

    // Construye la consulta SQL para buscar apartamentos
    $sql = "SELECT * FROM apartment WHERE postal_address = :address";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":address", $address);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $error_message = "Error en la consulta: " . $e->getMessage();
    }
}
?>

