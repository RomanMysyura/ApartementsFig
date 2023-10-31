<?php
// Inicializa la variable de error
$error_message = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos

    // Obtener los datos del formulario
    $name = $_POST["name"] ?? "";
    $last_name = $_POST["last_name"] ?? "";
    $telephone = $_POST["telephone"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? ""; // Hash de la contraseña
    $id_role = $_POST["id_role"] ?? 1;
    $formularipanel = $_POST["formularipanel"] ?? "";
    
    // Verificar si todos los campos obligatorios están presentes
    if (empty($name) || empty($last_name) || empty($telephone) || empty($email) || empty($password)) {
        $error_message = "Si us plau, completeu tots els camps del formulari.";
    } else {
        // Preparar la consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO users (name, last_name, telephone, email, password, id_role) VALUES (:name, :last_name, :telephone, :email, :password, :id_role)";

        try {
            // Preparar y ejecutar la consulta
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":last_name", $last_name);
            $stmt->bindParam(":telephone", $telephone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":id_role", $id_role); // Agregar el id_role aquí
            $stmt->execute();
        
            // Redirigir a la página de login.php después del registro exitoso
            if ($formularipanel == 1) {
                header("Location: index.php?r=paneldecontrol");
            } else {
                header("Location: index.php?r=login");
            }
            
            exit();
        } catch (PDOException $e) {
            // Manejar errores en caso de fallo en la inserción
            $error_message = "Error al registrar l'usuari: " . $e->getMessage();
        }
    }
}
?>
