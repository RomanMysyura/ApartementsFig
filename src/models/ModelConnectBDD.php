<?php
//Aquest model serveix per crear la connexio amb la base de dades
$server = '10.2.5.205';
$username = 'root';
$password = '1234';
$database = 'bddapartaments';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo 'ERROR CONNEXIÓ A LA BASE DE DATOS: ' . $e->getMessage();
}
?>
