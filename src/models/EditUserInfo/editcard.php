<?php
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../src/models/ModelConnectBDD.php';

    // Obtener los datos del formulario
    $credit_card = $_POST["credit_card"] ?? "";

    // Verificar si todos los campos obligatorios están presentes
    if (empty($credit_card)) {
        $error_message = "Si us plau, completeu tots els camps del formulari.";
    } else {
        // Obtener el nombre de usuario (puedes obtenerlo de la sesión o como mejor se adapte a tu sistema)
        $user_id = $_COOKIE['user_id']; // Reemplaza con la forma en que obtienes el nombre de usuario

        // Preparar la consulta SQL para actualizar la tarjeta de crédito del usuario
        $sql = "UPDATE users SET card_number = :credit_card WHERE id_user = :user_id";

        try {
            // Preparar y ejecutar la consulta
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":credit_card", $credit_card);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();

            // Redirigir a la página de perfil u otra después de la actualización exitosa
            header("Location: index.php?r=compte"); 
            exit();
        } catch (PDOException $e) {
            // Manejar errores en caso de fallo en la actualización
            $error_message = "Error al actualizar la tarjeta de crédito: " . $e->getMessage();
        }
    }
}
?>

