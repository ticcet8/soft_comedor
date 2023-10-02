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
        // Corroboro QUE NO INGRESEN DOS CURSOS IGUALES
        $sqlSC = "SELECT `id_curso`, `nombre` FROM `curso` WHERE nombre='$this->nombre'";
        echo $sqlSC;
        // Consulta SQL para insertar un nuevo usuario
        $r2 = $database->query($sqlSC);
        $row = $r2->fetch_assoc();

        if(!$row){
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
    public function actualizar($nombre_nuevo) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();
        // Corroboro QUE NO INGRESEN DOS CURSOS IGUALES
        $sqlSC = "SELECT `id_curso`, `nombre` FROM `curso` WHERE nombre='$nombre_nuevo'";
        echo $sqlSC;
        // Consulta SQL para insertar un nuevo usuario
        $r2 = $database->query($sqlSC);
        $row = $r2->fetch_assoc();

        if(!$row){

            $sql = "UPDATE curso SET nombre = '$nombre_nuevo' WHERE nombre = '$this->nombre'";
            echo $sql;
            // Ejecutar la consulta
            $result = $database->query($sql);

            // Verificar si la actualización fue exitosa
            if ($result) {
                $database->disconnect();
                return true;
            } else {
                echo "Error en la inserción: ";
                $database->disconnect();
                return false;
            }
        }
        
    }
    public function eliminar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();
        // Corroboro QUE NO INGRESEN DOS CURSOS IGUALES
        $sqlSC = "DELETE FROM curso WHERE nombre = '$this->nombre';";
        echo $sqlSC;

        // Ejecutar la consulta
        $result = $database->query($sqlSC);

        // Verificar si la eliminación fue exitosa
        if ($result) {
            $database->disconnect();
            return true;
        } else {
            echo "Error en la inserción: ";
            $database->disconnect();
            return false;
        }
        
    }
}
?>