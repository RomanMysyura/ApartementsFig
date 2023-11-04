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
    public function updateReservation($reservationId, $entryDate, $outputDate, $state) {
        $query = "UPDATE reservation SET entry_date = :entryDate, output_date = :outputDate, state = :state WHERE id_reserved = :reservationId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->bindValue(':entryDate', $entryDate);
        $stmt->bindValue(':outputDate', $outputDate);
        $stmt->bindValue(':state', $state);
        $stmt->execute();
    }
    
    
}

?>