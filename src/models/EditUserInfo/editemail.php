<?php
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../src/models/ModelConnectBDD.php';

    // Obtener los datos del formulario
    $email = $_POST["email"] ?? "";

    // Verificar si el campo de correo electrónico está presente
    if (empty($email)) {
        $error_message = "Por favor, complete el campo de correo electrónico.";
    } else {
        // Obtener el ID de usuario (puedes obtenerlo de la sesión o como mejor se adapte a tu sistema)
        $user_id = $_COOKIE['user_id']; // Reemplaza con la forma en que obtienes el ID de usuario

        // Preparar la consulta SQL para actualizar el correo electrónico del usuario
        $sql = "UPDATE users SET email = :email WHERE id_user = :user_id";

        try {
            // Preparar y ejecutar la consulta
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();

            // Redirigir a la página de perfil u otra después de la actualización exitosa
            header("Location: index.php?r=compte");
            exit();
        } catch (PDOException $e) {
            // Manejar errores en caso de fallo en la actualización
            $error_message = "Error al actualizar el correo electrónico: " . $e->getMessage();
        }
    }
}
?>
