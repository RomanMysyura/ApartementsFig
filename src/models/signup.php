<?php
// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include '../src/models/ModelConnectBDD.php';

    // Obtener los datos del formulario
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Hash de la contraseña

    // Preparar la consulta SQL para insertar un nuevo usuario
    $sql = "INSERT INTO users (name, last_name, telephone, email, password) VALUES (:name, :last_name, :telephone, :email, :password)";

    try {
        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":telephone", $telephone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        // Redirigir a una página de éxito o realizar alguna otra acción
        
        exit();
    } catch (PDOException $e) {
        // Manejar errores en caso de fallo en la inserción
        echo "Error al registrar usuario: " . $e->getMessage();
    }
}
?>
