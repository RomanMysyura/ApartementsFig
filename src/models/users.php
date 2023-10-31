<?php

namespace Daw;

class Users {
    private $sql;

    public function __construct($sql){
        $this->sql = $sql;
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
    
}

?>
