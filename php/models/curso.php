<?php
class Curso {
    private $id_curso;
    private $nombre;
    

    public function __construct($id,$nombre) {
        $this->id_curso = $id;
        $this->nombre= $nombre;
    }

    // Métodos para acceder a los atributos
    public function getIdcurso() {
        /**
         * Devuelve el ID del curso
         */
        return $this->id_curso; 
    }
    public function getCurso() {
        /**
         * Devuelve el Nombre del curso
         */
        return $this->nombre;
    }

    /** Este método sirve para iniciar sesión. Devolverá un diccionario con los datos de nombreDeUsuario,rol,id, error=0 en caso de poder iniciar 
     * sesion, encaso contrario devolvera error según el tipo
    */
    public static function getCursos(){
        
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
                //echo "ID: " . $row['id_curso'] . "<br>";
                //echo "Nombre Curso: " . $row['nombre'] . "<br>";
                $curso = new Curso(
                    $row['id_curso'],
                    $row['nombre']
                );
                $cursos[] = $curso;
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
        //echo $sqlSC;
        // Consulta SQL para insertar un nuevo usuario
        $r2 = $database->query($sqlSC);
        $row = $r2->fetch_assoc();

        if(!$row){
            $sql = "INSERT INTO `curso`(`nombre`) VALUES ('$this->nombre')";

            // Ejecutar la consulta
            $result = $database->query($sql);

            // Verificar si la inserción fue exitosa
            $id = -1;
            if ($result) {
                $id = $database->obtenerUltimoIdInsertado();
                $database->disconnect();
                return $id;
            } else {
                echo "Error en la inserción: " . $database->conn->error;
                $database->disconnect();
                return null;
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
        $sqlSC = "DELETE FROM curso WHERE id_curso = '$this->id_curso';";
        //echo $sqlSC;

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
    //Método para buscar un solo curso por dni y devolverlo.
     public static function obtenerPorId($id_curso) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener el estudiante por DNI
        $sql = "SELECT * FROM curso WHERE id_curso = '$id_curso'";
        
        // Ejecutar la consulta y obtener el resultado
        $result = $database->query($sql);
        if($result && $row = $result->fetch_assoc()){
            $curso = new Curso($id_curso,$row['nombre']);
            $database->disconnect();
            return $curso;
        }else{
            $database->disconnect();
            return null;
        }
    }
    /** Este método sirve para hacer paginación de los cursos
     * $nroPagina = Es el número de página correspondiente la consulta
     * $filas = Es el número de filas que quiero obtener
    */
    public static function getCursosPag($nroPagina, $filas){
        
        $database = new Database();
        $database->connect();

        // Consulta SQL para insertar un nuevo usuario
        $sql = "SELECT `id_curso`, `nombre` FROM `curso` LIMIT $nroPagina, $filas";
        // Ejecutar la consulta
        $result = $database->query($sql);
        $cursos = [];
        if($result){
            //si devolvio un resultado debería corroborar contraseña $pass
            while ($row = $result->fetch_assoc()) {
                //echo "ID: " . $row['id_curso'] . "<br>";
                //echo "Nombre Curso: " . $row['nombre'] . "<br>";
                $curso = new Curso(
                    $row['id_curso'],
                    $row['nombre']
                );
                $cursos[] = $curso;
            }
        }else{
            //sino devolver un string que diga error de usuario
           $usuario['error'] = 2; 
           $usuario['msj_error'] = 'Error de base de dato';
        }
        $database->disconnect();
        return $cursos;
    }
    public static function getCantCursos(){
        $database = new Database();
        $database->connect();
        $sql = "SELECT COUNT(*) AS total_filas FROM curso;";
        // Ejecutar la consulta
        $result = $database->query($sql);
        
        if($result){
            $fila = $result->fetch_assoc();
            $total_filas = $fila['total_filas'];
            return $total_filas;
        }else{
            return null;
        }
    }

}
?>