<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct() {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'soft_comedor';
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function disconnect() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }

    // Puedes agregar más métodos para ejecutar consultas específicas aquí

    // Ejemplo de método para obtener un solo resultado
    public function getSingleResult($sql) {
        $result = $this->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function obtenerUltimoIdInsertado() {
        return $this->conn->insert_id;
    }

}?>