<?php
class Comida{
    private $id_comida;
    private $nombre;

    //registro_comida
    private $id_registro;
    private $fecha;
    private $valoracion; 
    
    public function __construct($nombre, $fecha){
        $this->nombre = $nombre;
        $this->fecha = $fecha;
    }
    public function getId_comida(){
        return $this->id_comida;
    }
    public function setId_comida($id_comida){
        $this->id_comida = $id_comida;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function guardar(){
        $database = new Database();
        $database->connect();
        //Verifica si ya hay comida cargada ese día. 
        $sqlVerificar = "SELECT id FROM registro_comidas WHERE fecha = '$this->fecha'";
        //echo $sqlVerificar;
        $resultVerificar = $database->query($sqlVerificar);
        
        if ($resultVerificar && $resultVerificar->num_rows > 0) {
            //return false;
            //echo "no se puede";
        }else{ 
            //echo "si se puede";    
            // Consulta SQL para verificar si el estudiante ya existe la comida
            $sqlVerificar = "SELECT id_comida FROM comida WHERE nombre = '$this->nombre'";

            // Ejecutar la consulta de verificación
            $resultVerificar = $database->query($sqlVerificar);
            
            if ($resultVerificar && $resultVerificar->num_rows > 0) {
                $row = $resultVerificar->fetch_assoc();
                $this->id_comida = $row['id_comida'];
                //echo $this->id_comida;
            }else{
                //Inserto cómida
                $sqlInsertar = "INSERT INTO `comida`(`nombre`) VALUES ('$this->nombre')";
                $resultInsertar = $database->query($sqlInsertar);

                // Verificar si la inserción fue exitosa
                if ($resultInsertar) {
                    $this->id_comida = $database->obtenerUltimoIdInsertado(); // Obtener el ID generado
                    $database->disconnect();
                               
                } else {
                    //echo "Error en la inserción de comida";
                    $database->disconnect();
                    return false;
                }
                //Hago el registro 
                
            }
            $sqlInsertar = "INSERT INTO `registro_comidas`(`id_comida`, `fecha`, `valoracion`) VALUES ('$this->id_comida','$this->fecha','0')";
            //echo $sqlInsertar;
            $resultInsertar = $database->query($sqlInsertar);   
            if ($resultInsertar) {
                //echo "COmida guardada";
                return true;
            }else{
                //echo "COmida no guardada";
                return false;
            }
        }

    
    }
}
?>