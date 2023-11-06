<?php

namespace Daw;

class Reserves {
    private $sql;

    public function __construct($sql) {
        $this->sql = $sql;
    }
    public function getAllReservations() {
        $query = "SELECT * FROM reservation";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
    public function deleteReservation($reservationId) {
        $query = "DELETE FROM reservation WHERE id_reserved = :reservationId"; 
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->execute();
    }

    public function getSeason() {
        $query = "SELECT * FROM season";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function DoReservation($startDate, $endDate, $state, $price, $idUser, $idApartment, $idSeason) {
        $query = "INSERT INTO reservation (entry_date, output_date, state, price, id_user, id_apartment, id_season) VALUES (:startDate, :endDate, :state, :price, :idUser, :idApartment, :idSeason)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([
            ':startDate' => $startDate,
            ':endDate' => $endDate,
            ':state' => $state,
            ':price' => $price,
            ':idUser' => $idUser,
            ':idApartment' => $idApartment,
            ':idSeason' => $idSeason
        ]);
    }
    
    public function updateReservation($reservationId, $entryDate, $outputDate, $state) {
        $query = "UPDATE reservation SET entry_date = :entryDate, output_date = :outputDate, state = :state WHERE id_reserved = :reservationId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->bindValue(':entryDate', $entryDate);
        $stmt->bindValue(':outputDate', $outputDate);
        $stmt->bindValue(':state', $state);
        $stmt->execute();
    }
    
    public function getReservationData($reservationId) {
        $query = "SELECT * FROM reservation WHERE id_reserved = :reservationId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    
    
    
}

?>