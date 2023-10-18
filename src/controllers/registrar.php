<?php
function controlregistrar(){
    include '../src/models/ModelConnectBDD.php';

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopila los datos del formulario
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    // Validación de datos (puedes agregar más validaciones aquí)

    // Crea una instancia del modelo de conexión a la base de datos
    $db = new ModelConnectBDD();
    $conn = $db->getConnection();

    // Inserta los datos en la tabla 'users' de la base de datos
    $query = "INSERT INTO users (name, last_name, telephone, email) VALUES (:name, :last_name, :telephone, :email)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        // Registro exitoso, puedes redirigir o mostrar un mensaje de éxito
        echo "Registro exitoso";
    } else {
        // Error en el registro
        echo "Error en el registro";
    }
}
}



// Incluye el archivo de conexión a la base de datos

?>
