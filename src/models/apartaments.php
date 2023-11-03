<?php

namespace Daw;

class Apartaments {
    private $sql;

    public function __construct($sql) {
        $this->sql = $sql;
    }

    public function getAll() {
        $query = "SELECT * FROM apartment";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
    public function getAllSearch($startDate, $endDate, $numRooms) {

        $query = "SELECT * FROM apartment WHERE start_date <= :startDate AND end_date >= :endDate AND number_rooms >= :numRooms";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':startDate', $startDate);
        $stmt->bindValue(':endDate', $endDate);
        $stmt->bindValue(':numRooms', $numRooms);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }

    

}
?>
