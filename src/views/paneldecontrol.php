<!DOCTYPE html>
<html lang="en">
<head>
<?php require "menu.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    <script src="js/scripts.js"></script>
</head>
<body>
<?php include '../src/models/paneldecontrol.php';
try {
    // Prepara la consulta y ejecútala
    $stmt = $conn->query($sql);

    // Agrega un botón para desplegar la tabla
    echo '<button class="btnobrirtaula" type="button" data-bs-toggle="collapse" data-bs-target="#userTable">Taula usuaris</button>';

    // Agrega un contenedor div para la tabla con la clase "collapse"
    echo '<div class="collapse" id="userTable">';

    // Imprime la estructura de la tabla
    echo '<table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Cognom</th>
                    <th scope="col">Numero de telefon</th>
                    <th scope="col">Correu</th>
                    <th scope="col">Tarjeta bancaria</th>
                    <th scope="col">Role id</th>
                </tr>
            </thead>
            <tbody>';

    // Recorre los resultados y muestra los datos en filas de la tabla
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>
                <th scope="row">' . $row['id_user'] . '</th>
                <td>' . $row['name'] . '</td>
                <td>' . $row['last_name'] . '</td>
                <td>' . $row['telephone'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['card_number'] . '</td>
                <td>';
    
        if ($row['id_role'] == 1) {
            echo 'USUARI';
        }if ($row['id_role'] == 2) {
            echo 'GESTOR';
        }
         
        echo '</td></tr>';
    }
    
    // Cierra la tabla y el contenedor div
    echo '</tbody></table>';
    echo '</div>';
} catch (PDOException $e) {
    echo 'Error al recuperar datos de la base de datos: ' . $e->getMessage();
}

?>

    </div>


    <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
</body>
</html>