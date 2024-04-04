<?php
include '../lib/ddbb.php';
include '../models/diasacomer.php';
include '../models/usuario.php';
include '../models/estudiante.php';

if($_POST){
    $dni = $_POST['dni'];
    $estudiante = Estudiante::obtenerPorDNI($dni);
    $id_usuario = $estudiante->getId_usuario();
    $id_dias = $estudiante->getId_dias();
    echo $id_usuario;
    $usuario = Usuario::obtenerPorId($id_usuario);
    $dias = DiasAComer::obtenerPorIdObj($id_dias);
    if($estudiante->eliminar()){
        echo "estudiante eliminado";
        if($usuario->eliminar()){
            echo "usuario eliminado";
            if($dias->eliminar()){
                echo "dias eliminado";
            }else{
                echo "dias no eliminado";
            }
        }else{
            echo "usuario no eliminado";
        }
    }else{
        echo "estudiante no eliminado";
    }
    
    
    
}
?>