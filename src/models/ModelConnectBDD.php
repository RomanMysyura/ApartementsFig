<?php
//Aquest model serveix per crear la connexio amb la base de dades
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bddapartaments';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo 'ERROR CONNEXIÓ A LA BASE DE DATOS: ' . $e->getMessage();
}
?>
