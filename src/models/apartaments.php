<?php
include '../src/models/ModelConnectBDD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '../src/models/menu_search.php';
  
} else {
    $sql = "SELECT * FROM apartment";
    $stmt = $conn->query($sql);

}

?>
