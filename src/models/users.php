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
}

?>
