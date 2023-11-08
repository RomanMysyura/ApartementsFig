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

        $query = "SELECT * FROM apartment WHERE start_date >= :startDate AND end_date <= :endDate AND number_rooms >= :numRooms";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':startDate', $startDate);
        $stmt->bindValue(':endDate', $endDate);
        $stmt->bindValue(':numRooms', $numRooms);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }
    public function selectAllApartments(){
        $query = "SELECT * FROM apartment"; // Reemplaza 'apartment' con el nombre de tu tabla de apartamentos
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
        
    }

    public function addApartment($title, $postal_address, $length, $latitude, $short_description, $square_metres, $number_rooms, $services_extra, $price_day_low_season, $price_day_high_season) {
        $query = "INSERT INTO apartment (title, postal_address, length, latitude, short_description, square_metres, number_rooms, services_extra, price_day_low_season, price_day_high_season) VALUES (:title, :postal_address, :length, :latitude, :short_description, :square_metres, :number_rooms, :services_extra, :price_day_low_season, :price_day_high_season)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':postal_address' => $postal_address,
            ':length' => $length,
            ':latitude' => $latitude,
            ':short_description' => $short_description,
            ':square_metres' => $square_metres,
            ':number_rooms' => $number_rooms,
            ':services_extra' => $services_extra,
            ':price_day_low_season' => $price_day_low_season,
            ':price_day_high_season' => $price_day_high_season
        ]);
    }
    

    public function updateApartment(
        $apartmentId,
        $title,
        $postalAddress,
        $length,
        $latitude,
        $shortDescription,
        $squareMetres,
        $numberRooms,
        $servicesExtra,
        $priceLowSeason,
        $priceHighSeason
    ) {
        $query = "UPDATE apartment SET
            title = :title,
            postal_address = :postal_address,
            length = :length,
            latitude = :latitude,
            short_description = :short_description,
            square_metres = :square_metres,
            number_rooms = :number_rooms,
            services_extra = :services_extra,
            price_day_low_season = :price_day_low_season,
            price_day_high_season = :price_day_high_season
            WHERE id_apartment = :apartment_id";
    
        $stmt = $this->sql->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':postal_address' => $postalAddress,
            ':length' => $length,
            ':latitude' => $latitude,
            ':short_description' => $shortDescription,
            ':square_metres' => $squareMetres,
            ':number_rooms' => $numberRooms,
            ':services_extra' => $servicesExtra,
            ':price_day_low_season' => $priceLowSeason,
            ':price_day_high_season' => $priceHighSeason,
            ':apartment_id' => $apartmentId
        ]);
    }
    
    
    public function selectReservation($id){
        $query = "SELECT r.* FROM reservation r INNER JOIN users u ON r.id_user = u.id_user WHERE u.id_user = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getApartamentInfoById($id) {
        $query = "SELECT * FROM apartment WHERE id_apartment = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getImage($id) {
        $query = "SELECT * FROM img_apartments WHERE id_apartment = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }

    
}

    


?>
