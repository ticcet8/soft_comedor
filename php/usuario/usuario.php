<?php
class Usuario {
    private $id;
    private $nombreUsuario;
    private $password;
    private $rol;

    public function __construct($nombreUsuario, $password, $rol) {
        $this->nombreUsuario = $nombreUsuario;
        $this->password = $password;
        $this->rol = $rol;
    }

    // Métodos para acceder a los atributos
    public function getId() {
        return $this->id;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    // Método para guardar un nuevo usuario en la base de datos
    public function guardar() {
        // Instancia de la clase de base de datos
        $database = new Database("localhost", "usuario_db", "contraseña_db", "nombre_db");
        $database->connect();

        // Consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO usuarios (nombre_usuario, password, rol) VALUES ('$this->nombreUsuario', '$this->password', '$this->rol')";

        // Ejecutar la consulta
        $result = $database->query($sql);

        // Verificar si la inserción fue exitosa
        if ($result) {
            $this->id = $database->conn->insert_id; // Obtener el ID generado
            $database->disconnect();
            return true;
        } else {
            echo "Error en la inserción: " . $database->conn->error;
            $database->disconnect();
            return false;
        }
    }
}
?>