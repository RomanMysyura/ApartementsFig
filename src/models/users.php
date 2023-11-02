<?php

namespace Daw;

class Users {
    private $sql;

    public function __construct($sql){
        $this->sql = $sql;
    }

    public function selectUser($id){
        $query = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function selectAllUsers(){
        $query = "SELECT * FROM users";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id_user = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id' => $id]);
    }
    
    public function addUser($name, $last_name, $telephone, $email, $password, $id_role) {
        $query = "INSERT INTO users (name, last_name, telephone, email, password, id_role) VALUES (:name, :last_name, :telephone, :email, :password, :id_role)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':last_name' => $last_name,
            ':telephone' => $telephone,
            ':email' => $email,
            ':password' => $password,
            ':id_role' => $id_role
        ]);
    }

    public function selectAllApartments(){
        $query = "SELECT * FROM apartment"; // Reemplaza 'apartment' con el nombre de tu tabla de apartamentos
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
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

    public function login($email, $password){
        $stm = $this->sql->prepare('select * from users where email=:email;');
        $stm->execute([':email' => $email]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if(is_array($result) && $result["password"] == $password){
            return $result;
        } else {
            return false;
        }
    }
    

    public function register($name, $last_name, $telephone, $email, $password){
    
        $stmt = $this->sql->prepare('INSERT INTO users (name, last_name, telephone, email, password) VALUES (:name, :last_name, :telephone, :email, :password)');
        $stmt->execute([':name' => $name,':last_name' => $last_name,':telephone' => $telephone,':email' => $email,':password' => $password ]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


    public function updateUser($id_user, $name, $last_name, $telephone, $email, $card_number) {
        $query = "UPDATE users SET name = :name, last_name = :last_name, telephone = :telephone, email = :email, card_number = :card_number WHERE id_user = :id_user";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([
            ':id_user' => $id_user,
            ':name' => $name,
            ':last_name' => $last_name,
            ':telephone' => $telephone,
            ':email' => $email,
            ':card_number' => $card_number
        ]);
    }
    
    
    
    
    
}



?>