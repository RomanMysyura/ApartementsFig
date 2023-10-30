<?php
include '../src/models/infoapartaments.php';
// Asegúrate de que la sesión esté iniciada
session_start();

// Incluye la conexión a la base de datos y otras configuraciones necesarias
include '../src/models/ModelConnectBDD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $start_date = $_POST["startDate"];
    $end_date = $_POST["endDate"];

    // Obtén la ID del usuario de la sesión
    if (isset($_SESSION['user_id'])) {
        $id_user = $_SESSION['user_id'];
    } else {
        // Maneja el caso en el que no haya una sesión válida o el usuario no esté autenticado
        // Puedes redirigirlo a una página de inicio de sesión, mostrar un mensaje de error, etc.
        echo "No se ha iniciado sesión o se ha producido un error en la autenticación.";
        header('Location: index.php?r=infoapartaments&id=' . $apartmentId);
        exit;
    }

    // Obtén la ID del apartamento (supongo que obtienes esto de alguna manera en infoapartaments.php)
    $id_apartment = $apartmentId;

    // Define la ID de la temporada
    $id_season = 1;

    $price = 110.00;

    // Define el estado de la reserva (puedes configurar esto según tus necesidades)
    $state = "Pendiente";

    // Realiza una consulta SQL preparada para insertar la reserva en la base de datos
    $sql = "INSERT INTO reservation (entry_date, output_date, state, price, id_user, id_apartment, id_season) 
            VALUES (:entry_date, :output_date, :state, :price, :id_user, :id_apartment, :id_season)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':entry_date', $start_date, PDO::PARAM_STR);
    $stmt->bindParam(':output_date', $end_date, PDO::PARAM_STR);
    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR); // Define el valor de $price según tus necesidades
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':id_apartment', $id_apartment, PDO::PARAM_INT);
    $stmt->bindParam(':id_season', $id_season, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Reserva realizada con éxito";
    } else {
        echo "Error al realizar la reserva: " . $stmt->errorInfo()[2];
    }
}
?>
