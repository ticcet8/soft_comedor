<?php
class Usuario {
    private $id;
    private $nombreUsuario;
    private $password;
    private $rol;

    public function __construct($nombreUsuario, $password, $rol=0) {
        //Roles: 0 estudiante, 1 cocinera y 2 admin.
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
    public function setNombreUsuario($nombre){
        $this->nombreUsuario = $nombre;
    }
    public function getPassword() {
        return $this->password;
    }
    public function resetPassword(){
        $this->password="1234";
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
                    $usuario['error']=1;
                    $usuario['msj_error']= "Password Incorrecto";
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
        // Corroboro que NO SE ENCUENTRE ESE USUARIO DE ANTEMANO hacer un Array con el error
        $sqlSC = "SELECT `nombre_usuario` FROM `usuarios` WHERE nombre_usuario='$this->nombreUsuario'";
        //echo $sqlSC;
        // Consulta SQL para insertar un nuevo usuario
        $r2 = $database->query($sqlSC);
        $row = $r2->fetch_assoc();

        if(!$row){
            // Consulta SQL para insertar un nuevo usuario
            $sql = "INSERT INTO usuarios (nombre_usuario, password, rol) VALUES ('$this->nombreUsuario', '$this->password', '$this->rol')";

            // Ejecutar la consulta
            $result = $database->query($sql);

            // Verificar si la inserción fue exitosa
            if ($result) {
                $id = $database->obtenerUltimoIdInsertado();
                $database->disconnect();
                return $id;
            } else {
                echo "Error en la inserción: " . $database->conn->error;
                $database->disconnect();
                return false;
            }
        }
    }

    // Método para eliminar un usuario de la base de datos
    public function eliminar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para eliminar el usuario
        $sql = "DELETE FROM usuarios WHERE id_usuario = $this->id";
        //echo $sql;
        // Ejecutar la consulta
        $result = $database->query($sql);

        // Verificar si la eliminación fue exitosa
        if ($result) {
            $database->disconnect();
            return true;
        } else {
            echo "Error en la eliminación: ";
            $database->disconnect();
            return false;
        }
    }

    public static function obtenerPorNombre($nombreUsuario) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener el usuario por ID
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombreUsuario'";

        // Ejecutar la consulta y obtener el resultado
        $result = $database->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            $usuario = new Usuario($row['nombre_usuario'], $row['password'], $row['rol']);
            $usuario->id = $row['id_usuario'];
            $database->disconnect();
            return $usuario;
        } else {
            $database->disconnect();
            return null;
        }
    }
    public static function obtenerPorId($id) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener el usuario por ID
        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";

        // Ejecutar la consulta y obtener el resultado
        $result = $database->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            $usuario = new Usuario($row['nombre_usuario'], $row['password'], $row['rol']);
            $usuario->id = $row['id_usuario'];
            $database->disconnect();
            return $usuario;
        } else {
            $database->disconnect();
            return null;
        }
    }
    public function actualizar($nombreUsuario,$rol=0){
        $this->nombreUsuario = $nombreUsuario;
        $this->rol = $rol;
        $database = new Database();
        $database->connect();
        
        $sql = "UPDATE usuarios SET nombre_usuario = '$this->nombreUsuario', rol = '$this->rol' WHERE id_usuario = $this->id";
        $result = $database->query($sql);

        // Verificar si la actualización fue exitosa
        if ($result) {
            $database->disconnect();
            return true;
        } else {
            $database->disconnect();
            return false;
        }
    }
}
?>