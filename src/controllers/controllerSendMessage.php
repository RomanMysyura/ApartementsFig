<?php
function controllerSendMessage($request, $response, $container) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recopila los datos del formulario
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Llama a la función sendMessage para guardar los datos
        $users = $container->users();
        $users->sendMessage($name, $email, $message);

        // Redirige a la página deseada después de enviar el formulario
        header('Location: index.php?r= '); // Puedes personalizar la URL de redirección
        exit;
    }

    return $response;
}
