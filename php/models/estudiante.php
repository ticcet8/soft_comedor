<?php
    class Estudiante{
        private $id_estudiante;
        private $nombre;
        private $apellido;
        private $alergias;
        private $habilitado;
        private $id_dias;
        private $id_usuario;
    
    
    public function __construct($nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso) {
        /**Constructor de la clase */
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->alergias = $alergias;
        $this->habilitado = $habilitado;
        $this->id_dias = $id_dias;
        $this->id_curso = $id_curso;
        $this->id_usuario = $id_usuario;
    }
    
    public function getDatosEstudiante() {
    /** Método para obtener todos los datos del estudiante */
        $datosEstudiante = array(
            'id_estudiante' => $this->id_estudiante,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'alergias' => $this->alergias,
            'habilitado' => $this->habilitado,
            'dni' => $this->dni,
            'id_dias_acomer' => $this->id_dias,
            'id_usuario' => $this->id_usuario,
            'id_curso' => $this->id_curso
        );
        return $datosEstudiante;
    }
    public function getID(){
        return $this->id_estudiante;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getAlergias(){
        return $this->alergias;
    }
    public function getHabilitado(){
        return $this->habilitado;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getId_dias(){
        return $this->id_dias;
    }
    public function getId_usuario(){
        return $this->id_usuario;
    }
    public function getId_curso(){
        return $this->id_curso;
    }

    public function setIdEstudiante($id_estudiante) {
        $this->id_estudiante = $id_estudiante;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setAlergias($alergias) {
        $this->alergias = $alergias;
    }

    public function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }

    public function setIdDias($id_dias) {
        $this->id_dias = $id_dias;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }


    // Método para guardar un estudiante en la base de datos
    public function guardar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para verificar si el estudiante ya existe por DNI
        $sqlVerificar = "SELECT id_estudiante FROM estudiante WHERE dni = '$this->dni'";

        // Ejecutar la consulta de verificación
        $resultVerificar = $database->query($sqlVerificar);

        if ($resultVerificar && $resultVerificar->num_rows > 0) {
            // El estudiante ya existe, devuelve el ID del estudiante existente
            $row = $resultVerificar->fetch_assoc();
            $this->id_estudiante = $row['id_estudiante'];
            $database->disconnect();
            return $this->id_estudiante;
        } else {
            // El estudiante no existe, procede a insertarlo
            $sqlInsertar = "INSERT INTO `estudiante`(`nombre`, `apellido`, `dni`, `alergias`, `habilitado`, `id_curso`, `id_dias_acomer`, `id_usuario`) VALUES ('$this->nombre','$this->apellido','$this->dni','$this->alergias',$this->habilitado,$this->id_curso,$this->id_dias,$this->id_usuario)";
            //echo $sqlInsertar;
            // Ejecutar la consulta de inserción
            $resultInsertar = $database->query($sqlInsertar);

            // Verificar si la inserción fue exitosa
            if ($resultInsertar) {
                $this->id_estudiante = $database->obtenerUltimoIdInsertado(); // Obtener el ID generado
                $database->disconnect();
                return $this->id_estudiante;
            } else {
                echo "Error en la inserción: ";
                $database->disconnect();
                return false;
            }
        }
    }
    public function actualizar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para actualizar el estudiante
        //$nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso
        $sql = "UPDATE estudiante SET
            `nombre`='$this->nombre',
            `apellido`='$this->apellido',
            `dni`='$this->dni',
            `alergias`='$this->alergias',
            `id_dias_acomer`='$this->id_dias',
            `habilitado`=$this->habilitado
            WHERE id_estudiante = $this->id_estudiante";
       
        // Ejecutar la consulta
        $result = $database->query($sql);

        // Verificar si la actualización fue exitosa
        if ($result) {
            $database->disconnect();
            return true;
        } else {
            echo "Error en la actualización: ";
            $database->disconnect();
            return false;
        }
    }
    
    public function eliminar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para eliminar el estudiante
        $sql = "DELETE FROM estudiante WHERE id_estudiante = $this->id_estudiante";

        // Ejecutar la consulta
        $result = $database->query($sql);

        // Verificar si la eliminación fue exitosa
        if ($result) {
            $database->disconnect();
            $usuario = Usuario::obtenerPorId($this->id_usuario);
            //var_dump($usuario);
            $usuario->eliminar();
            return true;
        } else {
            echo "Error en la eliminación: " . $database->conn->error;
            $database->disconnect();
            return false;
        }
    }

    //Método para obtener un solo estudiante por dni
    public static function obtenerPorDNI($dni) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener el estudiante por DNI
        $sql = "SELECT * FROM estudiante WHERE dni = '$dni'";

        // Ejecutar la consulta y obtener el resultado
        $result = $database->query($sql);
        //$nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso)
        if ($result && $row = $result->fetch_assoc()) {
            
            $estudiante = new Estudiante(
                $row['nombre'],
                $row['apellido'],
                $row['dni'],
                $row['alergias'],
                $row['habilitado'],
                $row['id_dias_acomer'],
                $row['id_usuario'],
                $row['id_curso']
            );
            $estudiante->id_estudiante = $row['id_estudiante'];
            $estudiante->dni = $row['dni'];
            $database->disconnect();
            return $estudiante;
        } else {
            $database->disconnect();
            return null; // No se encontró un estudiante con ese DNI
        }
    }
    //Método para obtener todos los estudiantes
    public static function getEstudiantes() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener todos los estudiantes
        $sql = "SELECT * FROM estudiante";

        // Ejecutar la consulta
        $result = $database->query($sql);

        $estudiantes = array();
        //$nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso)
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estudiante = new Estudiante(
                    $row['nombre'],
                    $row['apellido'],
                    $row['dni'],
                    $row['alergias'],
                    $row['habilitado'],
                    $row['id_dias_acomer'],
                    $row['id_usuario'],
                    $row['id_curso']
                );
                $estudiante->id_estudiante = $row['id_estudiante'];
                $estudiante->dni = $row['dni'];
                $estudiantes[] = $estudiante;
            }
        }

        $database->disconnect();
        return $estudiantes;
    }
    public static function obtenerPorNombreODNI($clave) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener el estudiante por DNI
        $sql = "SELECT * FROM `estudiante` WHERE LOWER(dni) = LOWER('$clave') OR LOWER(nombre) LIKE LOWER('%$clave%') OR LOWER(apellido) LIKE LOWER('%$clave%')";
        $result = $database->query($sql);
        // Ejecutar la consulta y obtener el resultado
        $estudiantes = array();
        //$nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso)
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estudiante = new Estudiante(
                    $row['nombre'],
                    $row['apellido'],
                    $row['dni'],
                    $row['alergias'],
                    $row['habilitado'],
                    $row['id_dias_acomer'],
                    $row['id_usuario'],
                    $row['id_curso']
                );
                $estudiante->id_estudiante = $row['id_estudiante'];
                $estudiante->dni = $row['dni'];
                $estudiantes[] = $estudiante;
            }
        }

        $database->disconnect();
        return $estudiantes;
    }
}

?>