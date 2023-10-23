<?php
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../src/models/ModelConnectBDD.php';

    // Obtener los datos del formulario
    $telephone = $_POST["telephone"] ?? "";

    // Verificar si el campo de número de teléfono está presente
    if (empty($telephone)) {
        $error_message = "Por favor, complete el campo de número de teléfono.";
    } else {
        // Obtener el ID de usuario de la sesión
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Preparar la consulta SQL para actualizar el número de teléfono del usuario
            $sql = "UPDATE users SET telephone = :telephone WHERE id_user = :user_id";

            try {
                // Preparar y ejecutar la consulta
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":telephone", $telephone);
                $stmt->bindParam(":user_id", $user_id);
                $stmt->execute();

                // Redirigir a la página de perfil u otra después de la actualización exitosa
                header("Location: index.php?r=compte");
                exit();
            } catch (PDOException $e) {
                // Manejar errores en caso de fallo en la actualización
                $error_message = "Error al actualizar el número de teléfono móvil: " . $e->getMessage();
            }
        } else {
            $error_message = "Sesión no iniciada o ID de usuario no encontrado.";
        }
    }
}
?>
