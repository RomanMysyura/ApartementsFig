<?php


// Config.php
include "../src/config.php";

// Controllers
include '../src/controllers/index.php';
include '../src/controllers/menu.php';
include '../src/controllers/signup.php';
include '../src/controllers/login.php';
include '../src/controllers/reservar.php';
include '../src/controllers/contactar.php';
include '../src/controllers/ubicacio.php';
include '../src/controllers/registrar.php';
include '../src/controllers/infoapartaments.php';
include '../src/controllers/compte.php';
include '../src/controllers/logout.php';
include '../src/controllers/paneldecontrol.php';



include "../src/controllers/controllerDoLogin.php";


include "../src/middleware/isLogged.php";

// Models
include '../src/models/connection.php';
include '../src/models/apartaments.php';
include '../src/models/signup.php';
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
    isLogged($request, $response, $container, "controllerindex");
} else if ($r == 'signup'){
    controllerentrar($request, $response, $container);
} else if ($r == 'login'){
    controllerlogin($request, $response, $container);
} else if ($r == 'reservar'){
    controllerreservar($request, $response, $container);
} else if ($r == 'contactar'){
    controllercontactar($request, $response, $container);
} else if ($r == 'ubicacio'){
    controllerubicacio($request, $response, $container);
} else if ($r == 'registrar'){
    controlregistrar($request, $response, $container);
} else if ($r == 'infoapartaments'){
    controllerinfoapartaments($request, $response, $container);
} else if ($r == 'compte'){
    controllercompte($request, $response, $container);
} else if ($r == 'logout'){
    controllerlogout($request, $response, $container);
}else if ($r == 'paneldecontrol'){
    controllerpaneldecontrol($request, $response, $container);
} else if($r == 'dologin') {
    controllerDoLogin($request, $response, $container);
}

$response->response();