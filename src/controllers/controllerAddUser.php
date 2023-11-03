<?php
function controllerAddUser($request, $response, $container) {
    $userModel = $container->users();

    // Comprueba si se ha enviado una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtén los datos del formulario
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_role = $_POST['id_role'];

        // Llama a la función addUser para agregar el usuario
        $userModel->addUser($name, $last_name, $telephone, $email, $password, $id_role);

        // Redirige de nuevo al panel de control
        $response->redirect("location: index.php?r=paneldecontrol");
        return $response;
    }
}
