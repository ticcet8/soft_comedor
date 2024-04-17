<?php
include '../lib/ddbb.php';
include '../models/comida.php';

if($_POST){
    $nombre_comida = $_POST['comida'];
    $fecha = $_POST['fecha'];
    //echo "$nombre_comida + $fecha";
    $comida = new Comida($nombre_comida,$fecha);
    
    if($comida->guardar()){
        //echo "guardada - $com";
        echo json_encode(array('mensaje' => 'Comida guardadada correctamente'));
    }else{
        //echo "no guardada - $com";
        echo json_encode(array('mensaje' => 'Comida no guardada correctamente'));
    }
}

?>