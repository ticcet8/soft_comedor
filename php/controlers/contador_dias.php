<?php
    include '../lib/ddbb.php';
    include '../models/diasacomer.php';
    include '../models/estudiante.php';

    $estudiantes = Estudiante::getEstudiantes();
    $l = 0;
    $m = 0;
    $x = 0;
    $j = 0;
    $v = 0;
    foreach ($estudiantes as $e){
        $idDias = $e->getId_dias();
        $dias = DiasAComer::obtenerPorId( $idDias );
        if($dias['lunes']!=0){
            $l++;
        }
        if($dias['martes']!=0){
            $m++;
        }
        if($dias['miercoles']!=0){
            $x++;
        }
        if($dias['jueves']!=0){
            $j++;
        }
        if($dias['viernes']!=0){
            $v++;
        }
    }
    $salida = array( 
        'l'=>$l,
        'm'=>$m,
        'x'=>$x,
        'j' => $j,
        'v' => $v 
      );
      
      echo json_encode($salida);
?>