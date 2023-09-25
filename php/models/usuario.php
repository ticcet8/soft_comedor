<?php
class Usuario {
    private $id;
    private $nombreUsuario;
    private $password;
    private $rol;

    public function __construct($nombreUsuario, $password, $rol=4) {
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
    /** Este método sirve para iniciar sesión. Devolverá un diccionario con los datos de nombreDeUsuario,rol,id, error=0 en caso de poder iniciar 
     * sesion, encaso contrario devolvera error según el tipo
    */
    public function iniciar_sesion(){
        
        $database = new Database();
        $database->connect();

        $nombre = $this->nombreUsuario;
        $pass = $this->password;
        // Consulta SQL para insertar un nuevo usuario
        $sql = "SELECT `id_usuario`, `nombre_usuario`, `password`, `rol` FROM `usuarios` WHERE nombre_usuario = '".$nombre."'";
        // Ejecutar la consulta
        $result = $database->query($sql);
        $usuario = array(
            'error'  => 0
        );
        if($result){
            //si devolvio un resultado debería corroborar contraseña $pass
            if($row = $result->fetch_assoc()){
                
                if($pass == $row['password']){
                    $usuario['id_usuario'] = $row['id_usuario'];
                    $usuario['nombre'] = $row['nombre_usuario'];
                    $usuario['rol'] = $row['rol'];
                }else{
                    $usuario['error']="Usuario no valido";
                }    
            }else{
                $usuario['msj_error']= "usuario no encontrado";
                $usuario['error']= 1;
            }
            
        
        }else{
            //sino devolver un string que diga error de usuario
           $usuario['error'] = 2; 
           $usuario['msj_error'] = 'Error de usuario';
        }
        $database->disconnect();
        return $usuario;
    }
    // Método para guardar un nuevo usuario en la base de datos
    public function guardar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO usuarios (nombre_usuario, password, rol) VALUES ('$this->nombreUsuario', '$this->password', '$this->rol')";

        // Ejecutar la consulta
        $result = $database->query($sql);

        // Verificar si la inserción fue exitosa
        if ($result) {
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