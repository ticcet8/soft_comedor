<?php
include '../lib/ddbb.php';
include '../models/diasacomer.php';
include '../models/usuario.php';
include '../models/estudiante.php';
/***Archivo para agregar estudiantes */
if($_POST){

    $nombre = $_POST['mod_nombre'];
    $apellido = $_POST['mod_apellido'];
    $dni = $_POST['mod_dni'];
    
    $id_curso = $_POST['mod_idCurso'];
    //$id_usuario = $_POST['mod_idUsuario'];
    $id_dias = $_POST['mod_idDias']; 

    $alergias = $_POST['mod_alergias'];
    $lunes = $_POST['mod_lunes'];
    $martes = $_POST['mod_martes'];
    $miercoles = $_POST['mod_miercoles'];
    $jueves = $_POST['mod_jueves'];
    $viernes = $_POST['mod_viernes'];
    $habilitado = ($_POST['mod_habilitado']=='on'?1:0);

    
    //Actualizar días a comer
    $diasacomer = DiasAComer::obtenerPorIdObj($id_dias);
    if($diasacomer->actualizardias($lunes,$martes,$miercoles,$jueves,$viernes)){
        echo json_encode(array('mensaje' => 'dias a comer actualizado correctamente'));
    }else{
        echo json_encode(array('mensaje' => 'dias a comer no actualizado'));
    }
    
    //Actualizar usuario - Decidí no modificar el nombre de usuario. 
    /**$nombre_usuario = $_POST['mod_nombre_usuario'];
    $usuario = Usuario::obtenerPorId($id_usuario);
    if($usuario.actualizar($nombre_usuario)){
        echo json_encode(array('mensaje' => 'usuario actualizado correctamente'));
    }else{
        echo json_encode(array('mensaje' => 'dias a comer no actualizado'));
    }*/

    //Actualizar estudiante
    $estudiante = Estudiante::obtenerPorDNI($dni);
    $estudiante->setNombre($nombre);
    $estudiante->setApellido($apellido);
    $estudiante->setAlergias($alergias);
    $estudiante->setHabilitado($habilitado);
    $estudiante->setIdDias($id_dias);
    //$estudiante->setIdUsuario($id_usuario);
    if($estudiante->actualizar()){
        echo json_encode(array('mensaje' => 'Estudiante actualizado correctamente'));
    }else{
        echo json_encode(array('error' => 'Estudiante no actualizado - Posiblemente existe'));
    }
     
}
?>