<?php
class Curso {
    private $id_curso;
    private $nombre;
    

    public function __construct($nombre) {
        $this->nombre= $nombre;
    }

    // Métodos para acceder a los atributos
    
    public function getCurso() {
        return $this->nombre;
    }

    /** Este método sirve para iniciar sesión. Devolverá un diccionario con los datos de nombreDeUsuario,rol,id, error=0 en caso de poder iniciar 
     * sesion, encaso contrario devolvera error según el tipo
    */
    public function getCursos(){
        
        $database = new Database();
        $database->connect();

        // Consulta SQL para insertar un nuevo usuario
        $sql = "SELECT `id_curso`, `nombre` FROM `curso` WHERE 1";
        // Ejecutar la consulta
        $result = $database->query($sql);
        $cursos = [];
        if($result){
            //si devolvio un resultado debería corroborar contraseña $pass
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['id_curso'] . "<br>";
                echo "Nombre Curso: " . $row['nombre'] . "<br>";
                $curso = array(
                    'id'=>$row['id_curso'],
                    'nombre'=>$row['nombre']
                );
                $cursos.append($curso);
            }
            
        
        }else{
            //sino devolver un string que diga error de usuario
           $usuario['error'] = 2; 
           $usuario['msj_error'] = 'Error de base de dato';
        }
        $database->disconnect();
        return $cursos;
    }
    // Método para guardar un nuevo usuario en la base de datos
    public function guardar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();
        // FALTA CORROBORAR QUE NO INGRESEN DOS CURSOS IGUALES
        // Consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO `curso`(`nombre`) VALUES ('$this->nombre')";

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