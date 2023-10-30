
<?php
 
// Incluir el archivo de conexión a la base de datos
include '../src/models/ModelConnectBDD.php';

// Variable para almacenar mensajes de error
$error_message = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta la base de datos para verificar la autenticación
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    // Comprobar si se encontró un registro que coincide
    if ($stmt->rowCount() == 1) {
        // Autenticación exitosa, guarda los datos en la sesión
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Inicia la sesión
        session_start();
        $_SESSION['username'] = $user['name'];
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['role_id'] = $user['id_role'];

        // Redirige al usuario a la página "compte.php" si ha iniciado sesión con éxito
        header("Location: index.php?r=compte");
        exit();
    } else {
        // Autenticación fallida, muestra un mensaje de error
        $error_message = "Correo o contraseña incorrectos.";
    }
}

// Resto del código para mostrar el formulario y mensajes de error
?>