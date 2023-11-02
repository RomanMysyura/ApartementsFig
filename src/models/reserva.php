<?php
include '../src/models/ModelConnectBDD.php';
include '../src/models/infoapartaments.php';


if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['reservar'])) {
   
    $startDate = new DateTime($_POST["startDate"]);
    $endDate = new DateTime($_POST["endDate"]);

    if (isset($_SESSION['user_id'])) {
        $id_user = $_SESSION['user_id'];
    } else {
        header('Location: index.php?r=login');
        exit;
    }

    $sql = "SELECT * FROM season";
    $result = $conn->query($sql);
    echo "fondo4";
    if ($result->num_rows > 0) {
        $highStartDateSeason = null;
        $highEndDateSeason = null;
        $lowStartDateSeason = null;
        $lowEndDateSeason = null;
        $idSeason = 0;

        while ($row = $result->fetch_assoc()) {
            if ($row["id"] == "1") {
                $lowStartDateSeason = new DateTiem($row["start_date"]);
                $lowEndDateSeason = new DateTime($row["end_date"]);
            } else {
                $highStartDateSeason = new DateTime($row["start_date"]);
                $highEndDateSeason = new DateTime($row["end_date"]);
            }
        }

        $highSeasonDays = 0;
        $lowSeasonDays = 0;

        if ($startDate >= $highStartDateSeason && $endDate <= $highEndDateSeason) {
            $idSeason = 2;
        } elseif ($startDate >= $lowStartDateSeason && $endDate <= $lowEndDateSeason) {
            $idSeason = 1;
        } else {
            $highSeasonDays = min($endDate, $highEndDateSeason)->diff(max($startDate, $highStartDateSeason))->days;
            $lowSeasonDays = min($endDate, $lowEndDateSeason)->diff(max($startDate, $lowStartDateSeason))->days;

            if ($highSeasonDays > $lowSeasonDays) {
                $idSeason = 2;
            } else {
                $idSeason = 1;
            }
        }
    }
    echo "fondo3";
    $sql = "SELECT * FROM apartment";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $price_apartment = null;

        while ($row = $result->fetch_assoc()) {
            if ($idSeason == 1) {
                $price_apartment = $row["price_day_low_season"];
            } else {
                $price_apartment = $row["price_day_high_season"];
            }
        }
    }

    $id_apartment = $apartmentId;
    $state = "Pendent";
    $sql = "INSERT INTO reservation (entry_date, output_date, state, price, id_user, id_apartment, id_season) 
                VALUES (:entry_date, :output_date, :state, :price, :id_user, :id_apartment, :id_season)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':entry_date', $startDate, PDO::PARAM_STR);
    $stmt->bindParam(':output_date', $endDate, PDO::PARAM_STR);
    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price_apartment, PDO::PARAM_STR);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':id_apartment', $id_apartment, PDO::PARAM_INT);
    $stmt->bindParam(':id_season', $idSeason, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Reserva realizada con éxito";
    } else {
        echo "Error al realizar la reserva: " . $stmt->errorInfo()[2];
    }
  echo "fondo";
die();
} else {
    echo 'Error';
}
?>