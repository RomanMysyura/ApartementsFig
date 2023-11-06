<?php

namespace Daw;

class Users {
    private $sql;

    public function __construct($sql){
        $this->sql = $sql;
    }
    public function sendMessage($name, $email, $message) {
        // Inserta los datos en la tabla "contact_requests"
        $query = "INSERT INTO contact_requests (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message,
        ]);
    }
    
    public function selectAllMessages() {
        $query = "SELECT * FROM contact_requests";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
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