<?php
include '../lib/ddbb.php';
include '../models/curso.php';

    if($_POST){
        $nombreCurso = $_POST["nombreCurso"];
        $curso = new Curso(0, $nombreCurso);
        $id_curso =$curso->guardar();
        if(isset($id_curso)){
            echo json_encode(array('mensaje' => 'Curso guardado correctamente','id'=>$id_curso));
        }else{
            echo json_encode(array('mensaje' => 'Curso no guardado','id'=>$id_curso));
        }

    }
?>