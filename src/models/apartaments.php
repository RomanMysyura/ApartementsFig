<?php
include '../src/models/ModelConnectBDD.php';

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $numRooms = $_POST['numRooms'];

    if (!empty($startDate) && !empty($endDate) && !empty($numRooms)) {
        $sql = "SELECT * FROM apartment WHERE start_date = :startDate AND end_date = :endDate AND number_rooms = :numRooms";
    } else if (!empty($startDate) && !empty($endDate)) {
        $sql = "SELECT * FROM apartment WHERE start_date = :startDate AND end_date = :endDate";
    } else if (!empty($startDate) && !empty($numRooms)) {
        $sql = "SELECT * FROM apartment WHERE start_date = :startDate AND number_rooms = :numRooms";
    } else if (!empty($endDate) && !empty($numRooms)) {
        $sql = "SELECT * FROM apartment WHERE end_date = :endDate AND number_rooms = :numRooms";
    } else if (!empty($startDate)) {
        $sql = "SELECT * FROM apartment WHERE start_date = :startDate";
    } else if (!empty($endDate)) {
        $sql = "SELECT * FROM apartment WHERE end_date = :endDate";
    } else if (!empty($numRooms)) {
        $sql = "SELECT * FROM apartment WHERE number_rooms = :numRooms";
    }

    $stmt = $conn->prepare($sql);

    if (!empty($startDate) && !empty($endDate) && !empty($numRooms)) {
        $stmt->bindParam(":startDate", $startDate);
        $stmt->bindParam(":endDate", $endDate);
        $stmt->bindParam(":numRooms", $numRooms);
    } elseif (!empty($startDate) && !empty($endDate)) {
        $stmt->bindParam(":startDate", $startDate);
        $stmt->bindParam(":endDate", $endDate);
    } elseif (!empty($startDate) && !empty($numRooms)) {
        $stmt->bindParam(":startDate", $startDate);
        $stmt->bindParam(":numRooms", $numRooms);
    } elseif (!empty($endDate) && !empty($numRooms)) {
        $stmt->bindParam(":endDate", $endDate);
        $stmt->bindParam(":numRooms", $numRooms);
    } elseif (!empty($startDate)) {
        $stmt->bindParam(":startDate", $startDate);
    } elseif (!empty($endDate)) {
        $stmt->bindParam(":endDate", $endDate);
    } elseif (!empty($numRooms)) {
        $stmt->bindParam(":numRooms", $numRooms);
    } 

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $error_message = "Error en la consulta: " . $e->getMessage();
    }
    
} else {

    $sql = "SELECT * FROM apartment";
    $stmt = $conn->query($sql);

}
?>
