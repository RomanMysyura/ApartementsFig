<?php
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../src/models/ModelConnectBDD.php';

    // Asegúrate de que la sesión esté iniciada
   

    // Obtener los datos del formulario
    $name = $_POST["name"] ?? "";

    // Verificar si el campo de nombre está presente
    if (empty($name)) {
        $error_message = "Por favor, complete el campo de nombre.";
    } else {
        // Obtener el ID de usuario de la sesión
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Preparar la consulta SQL para actualizar el nombre del usuario
            $sql = "UPDATE users SET name = :name WHERE id_user = :user_id";

            try {
                // Preparar y ejecutar la consulta
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":user_id", $user_id);
                $stmt->execute();

                // Redirigir a la página de perfil u otra después de la actualización exitosa
                header("Location: index.php?r=compte");
                exit();
            } catch (PDOException $e) {
                // Manejar errores en caso de fallo en la actualización
                $error_message = "Error al actualizar el nombre: " . $e->getMessage();
            }
        } else {
            $error_message = "Sesión no iniciada o ID de usuario no encontrado.";
        }
    }
}
?>
