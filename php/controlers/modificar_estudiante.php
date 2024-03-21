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
    $id_usuario = $_POST['mod_idUsuario'];
    $id_dias = $_POST['mod_idDias'];


    $id_curso = $_POST['mod_curso'];
    $alergias = $_POST['mod_alergias'];
    $lunes = $_POST['mod_lunes'];
    $martes = $_POST['mod_martes'];
    $miercoles = $_POST['mod_miercoles'];
    $jueves = $_POST['mod_jueves'];
    $viernes = $_POST['mod_viernes'];
    $habilitado = ($_POST['mod_habilitado']=='on'?1:0);

    /***
    //Actualizar días a comer
    $diasacomer = new DiasAComer($lunes,$martes,$miercoles,$jueves,$viernes);
    $id_dias = $diasacomer->guardar();
    
    //Actualizar usuario
    $nombre_usuario = $_POST['mod_nombre_usuario'];
    $usuario = new Usuario($nombre_usuario_sa,$dni);
    $id_usuario = $usuario->guardar();

    //Actualizar estudiante
    $estudiante = new Estudiante ($nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso);
    if($estudiante->actualizar()){
        echo json_encode(array('mensaje' => 'Estudiante guardado correctamente'));
    }else{
        echo json_encode(array('error' => 'Estudiante no guardado - Posiblemente existe'));
    }
     */
}
?>