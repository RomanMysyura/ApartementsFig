<?php


// Config.php

// Controllers
include '../src/controllers/index.php';
include '../src/controllers/menu.php';
include '../src/controllers/libs.php';
include '../src/controllers/signup.php';
include '../src/controllers/login.php';
include '../src/controllers/reservar.php';
include '../src/controllers/contactar.php';
include '../src/controllers/ubicacio.php';
include '../src/controllers/registrar.php';
// Models
// include '../src/models/ModelConnectBDD.php';
// include '../src/models/signup.php';



$r = isset($_GET['r']) ? $_GET['r'] : '/';

if ($r === '/') {
    controllerindex();
} else if ($r === 'signup'){
    controllerentrar();
} else if ($r === 'login'){
    controllerlogin();
} else if ($r === 'reservar'){
    controllerreservar();
} else if ($r === 'contactar'){
    controllercontactar();
} else if ($r === 'ubicacio'){
    controllerubicacio();
} else if ($r === 'registrar'){
    controlregistrar();
}

/////fdsfdfsfd