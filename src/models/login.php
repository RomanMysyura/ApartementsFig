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
        // Autenticación exitosa, guarda los datos en la sesión
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Guarda los datos en la sesión
        session_start();
        $_SESSION['username'] = $user['name'];
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['role_id'] = $user['id_role'];

        // Redirige al usuario a la página "compte.php" si ha iniciado sesión con éxito
        header("Location: index.php?r=compte");
        exit();
    } else {
        // Autenticación fallida, muestra un mensaje de error
        $error_message = "Correu o contrasenya incorrectes.";
    }
} else {
    // Redirecciona o muestra un mensaje de error si se accede directamente a process_login.php sin datos del formulario
    $error_message = "";
}
?>
