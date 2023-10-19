<?php
$server = '10.2.5.205';
$username = 'root';
$password = '1234';
$database = 'bddapartaments';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'CONNECTAT';
} catch (PDOException $e) {
    echo 'No connectat: ' . $e->getMessage();
}
?>
