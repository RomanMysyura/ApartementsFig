<?php
// Incluye el archivo de conexión a la base de datos
$error_message = "";

include '../src/models/ModelConnectBDD.php';

// Verifica si se han enviado datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta la base de datos para verificar la autenticación
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    // Comprueba si se encontró un registro que coincide
    if ($stmt->rowCount() == 1) {
        // Autenticación exitosa, muestra los datos del usuario
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Autenticación exitosa. Datos del usuario:<br>";
        echo "Nombre: " . $user['name'] . "<br>";
        echo "Apellido: " . $user['last_name'] . "<br>";
        echo "Teléfono: " . $user['telephone'] . "<br>";

        // Establecer las cookies
        setcookie("username", $user['name'], time() + 2592000, "/");
        setcookie("user_id", $user['id_user'], time() + 2592000, "/");

        
        // Redirige al usuario a la página "compte.php" si ha iniciado sesión con éxito
        header("Location: index.php?r=compte");
        exit(); // Asegura que la redirección se complete y finaliza la ejecución del script
    } else {
        // Autenticación fallida, muestra un mensaje de error
        $error_message = "Correu o contrasenya incorrecte.";
    }
} else {
    // Redirecciona o muestra un mensaje de error si se accede directamente a process_login.php sin datos del formulario
    $error_message = "";
}
?>
