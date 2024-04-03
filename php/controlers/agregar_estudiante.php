<?php
include '../lib/ddbb.php';
include '../models/diasacomer.php';
include '../models/usuario.php';
include '../models/estudiante.php';
/***Archivo para agregar estudiantes */
if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $id_curso = $_POST['curso'];
    $alergias = $_POST['alergias'];
    $lunes = $_POST['lunes'];
    $martes = $_POST['martes'];
    $miercoles = $_POST['miercoles'];
    $jueves = $_POST['jueves'];
    $viernes = $_POST['viernes'];
    $habilitado = ($_POST['habilitado']=='on'?1:0);
    $diasacomer = new DiasAComer($lunes,$martes,$miercoles,$jueves,$viernes);
    $id_dias = $diasacomer->guardar();
    $nombre_usuario_sa = $_POST['nombre_usuario'];
    $usuario = new Usuario($nombre_usuario_sa,$dni);
    $id_usuario = $usuario->guardar();
    $estudiante = new Estudiante ($nombre, $apellido, $dni, $alergias, $habilitado, $id_dias, $id_usuario,$id_curso);
    if($estudiante->guardar()){
        echo json_encode(array('mensaje' => 'Estudiante guardado correctamente'));
    }else{
        echo json_encode(array('error' => 'Estudiante no guardado - Posiblemente existe'));
    }
}
?>