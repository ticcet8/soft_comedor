<?php
class DiasAComer{
    private $id_diasacomer;
    private $lunes;
    private $martes;
    private $miercoles;
    private $jueves;
    private $viernes;

    public function __construct($lunes,$martes,$miercoles,$jueves,$viernes) {
        /** Ingresar el 0 para nada, 1 para 11.15, 2 para 12.20, 3 para 13.00 */
        $this->lunes= $lunes;
        $this->martes= $martes;
        $this->miercoles= $miercoles;
        $this->jueves= $jueves;
        $this->viernes= $viernes;        
    }
    public function obtenerdias(){
        $dias = array(
            'lunes' => $this->lunes,
            'martes' => $this->martes,
            'miercoles' => $this->miercoles,
            'jueves' => $this->jueves,
            'viernes' => $this->viernes
        );
        return $dias;
    }
    public function setID($id){
        $this->id_diasacomer = $id;
    }
    public function actualizardias($lunes,$martes,$miercoles,$jueves,$viernes){
        $database = new Database();
        $database->connect();

        // Consulta SQL para insertar un nuevo usuario
        $sql = "UPDATE `dias_acomer` SET `lunes`='$lunes',`martes`='$martes',`miercoles`='$miercoles',`jueves`='$jueves',`viernes`='$viernes' WHERE id_dias_acomer=$this->id_diasacomer";
        // Ejecutar la consulta
        $result = $database->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function guardar() {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO `dias_acomer`(`lunes`, `martes`, `miercoles`, `jueves`, `viernes`) VALUES ('$this->lunes','$this->martes','$this->miercoles','$this->jueves','$this->viernes')";

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

    public static function obtenerPorNombre($id) {
        // Instancia de la clase de base de datos
        $database = new Database();
        $database->connect();

        // Consulta SQL para obtener el usuario por ID
        $sql = "SELECT * FROM `dias_acomer` WHERE id_dias_acomer= '$id'";

        // Ejecutar la consulta y obtener el resultado
        $result = $database->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            $dias_a_comer = new Usuario($row['lunes'], $row['martes'], $row['miercoles'],row['jueves'],row['viernes']);
            $usuario->id = $row['id_dias_acomer'];
            $database->disconnect();
            return $usuario;
        } else {
            $database->disconnect();
            return null;
        }
    }   
    }
?>