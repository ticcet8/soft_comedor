<?php
include '../lib/ddbb.php';
include '../models/curso.php';
include '../models/estudiante.php';

if($_POST){
    $id_curso = $_POST['id_curso'];
    $curso = Curso::obtenerPorId($id_curso);
    $estudiantes = Estudiante::getEstudiantes();

    foreach($estudiantes as $e) {
        if($e->getId_curso() == $id_curso){
            $e->setIdCurso(0);
            $e->actualizar();
        }
    }
    if($curso->eliminar()){
        echo "Curso eliminado";
    }else{
        echo "Curso no eliminado";
    }
}
?>