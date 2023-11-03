<?php


// Config.php
include "../src/config.php";

// Controllers
include '../src/controllers/controllerindex.php';
include '../src/controllers/menu.php';
include '../src/controllers/footer.php';
include '../src/controllers/controllerDoRegister.php';
include '../src/controllers/login.php';
include '../src/controllers/reservar.php';
include '../src/controllers/controllerContactar.php';
include '../src/controllers/ubicacio.php';
include '../src/controllers/controllerRegister.php';
include '../src/controllers/infoapartaments.php';
include '../src/controllers/controllerCompte.php';
include '../src/controllers/controllerDoLogout.php';
include '../src/controllers/paneldecontrol.php';
include '../src/controllers/controllerDoReservas.php';

include "../src/controllers/controllerDoLogin.php";

include "../src/middleware/isLogged.php";

// Models
include '../src/models/connection.php';
include '../src/models/apartaments.php';
include '../src/models/users.php';

// Llibreria
include '../src/views/libs.php';

// Emeset Framework
include "../src/Emeset/Container.php";
include "../src/Emeset/Request.php";
include "../src/Emeset/Response.php";

// Scripts


// 
$request = new \Emeset\Request();
$response = new \Emeset\Response();
$container = new \Emeset\Container($config);

$r = '';
if (isset($_REQUEST["r"])) {
  $r = $_REQUEST["r"];
}

if ($r == '') {
    controllerindex($request, $response, $container);
} else if ($r == 'signup'){
    controllerRegister($request, $response, $container);
} else if ($r == 'login'){
    controllerlogin($request, $response, $container);
} else if ($r == 'reservar'){
    controllerreservar($request, $response, $container);
} else if ($r == 'contactar'){
    controllercontactar($request, $response, $container);
} else if ($r == 'ubicacio'){
    controllerubicacio($request, $response, $container);
} else if ($r == 'registrar'){
    controllerDoRegister($request, $response, $container);
} else if ($r == 'infoapartaments'){
    controllerinfoapartaments($request, $response, $container);
} else if ($r == 'compte'){
    isLogged($request, $response, $container, "controllerCompte");
} else if ($r == 'logout'){
    controllerDoLogout($request, $response, $container);
}else if ($r == 'paneldecontrol'){
    controllerpaneldecontrol($request, $response, $container);
} else if($r == 'dologin') {
    controllerDoLogin($request, $response, $container);
}else if($r == 'doregister') {
    controllerRegister($request, $response, $container);
} else if($r == 'doreserva') {
    controllerDoReservas($request, $response, $container);
} 

$response->response();