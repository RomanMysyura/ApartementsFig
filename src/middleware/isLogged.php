<?php
function isLogged($request, $response, $container, $next){
    // Aquí va el código del middleware
    $logged = $request->get("SESSION", "logged");
    
    if(!$logged) {
        $response->redirect("location: index.php?r=login");
        return $response;
    }

    $name = $request->get("SESSION", "name");


    $response->set("email", $request->get("SESSION", "email"));

    $response = $next($request, $response, $container);

    return $response;
}
