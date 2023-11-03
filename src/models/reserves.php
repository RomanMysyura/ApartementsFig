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
    
}

?>