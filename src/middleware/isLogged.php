<?php
function isLogged($request, $response, $container, $next){
    // Aquí va el código del middleware
    $logged = $request->get("SESSION", "logged");

    if(!$logged) {
        $response->redirect("location: index.php?r=login");
        return $response;
    }

    // Obtiene el valor de "name" de la sesión si está disponible
    $name = $request->get("SESSION", "name");

    // Puedes utilizar $name en tu middleware

    // También puedes establecer "email" en el objeto de respuesta si lo necesitas
    $response->set("email", $request->get("SESSION", "email"));

    // Llama al siguiente middleware o controlador
    $response = $next($request, $response, $container);

    return $response;
}
