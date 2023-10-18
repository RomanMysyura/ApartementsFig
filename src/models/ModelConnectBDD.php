<?php
class ModelConnectarBDD
{
    private $host = '10.2.5.205'; // Dirección IP del servidor de la base de datos
    private $db_name = 'bddapartaments'; // Nombre de la base de datos
    private $username = 'root'; // Nombre de usuario
    private $password = '1234'; // Contraseña
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

        return $this->conn;
    }
}