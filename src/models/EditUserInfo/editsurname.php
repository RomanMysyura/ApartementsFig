<?php
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../src/models/ModelConnectBDD.php';

    // Obtener los datos del formulario
    $last_name = $_POST["last_name"] ?? "";

    // Verificar si el campo del apellido está presente
    if (empty($last_name)) {
        $error_message = "Por favor, complete el campo de apellido.";
    } else {
        // Obtener el ID de usuario (puedes obtenerlo de la sesión o como mejor se adapte a tu sistema)
        $user_id = $_COOKIE['user_id']; // Reemplaza con la forma en que obtienes el ID de usuario

        // Preparar la consulta SQL para actualizar el apellido del usuario
        $sql = "UPDATE users SET last_name = :last_name WHERE id_user = :user_id";

        try {
            // Preparar y ejecutar la consulta
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":last_name", $last_name);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();

            // Redirigir a la página de perfil u otra después de la actualización exitosa
            header("Location: index.php?r=compte");
            exit();
        } catch (PDOException $e) {
            // Manejar errores en caso de fallo en la actualización
            $error_message = "Error al actualizar el apellido: " . $e->getMessage();
        }
    }
}
?>
