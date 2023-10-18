<?php
class ModelSignup
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username, $password)
    {
        try {
            $query = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                // Inicio de sesión exitoso
                return true;
            } else {
                // Nombre de usuario o contraseña incorrectos
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}