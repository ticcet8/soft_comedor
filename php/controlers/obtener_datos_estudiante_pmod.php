<?php
include '../lib/ddbb.php';
include '../models/diasacomer.php';
include '../models/usuario.php';
include '../models/estudiante.php';
/***Archivo para agregar estudiantes */
if($_POST){
    $dni = $_POST['dni'];
    $estudiante = Estudiante::obtenerPorDNI($dni);
    $nombre = $estudiante->getNombre();
    $apellido = $estudiante->getApellido();
    $dias = DiasAComer::obtenerPorId($estudiante->getId_dias());
    $usuario = Usuario::obtenerPorId($estudiante->getId_usuario());
    $nombre_usuario = $usuario->getNombreUsuario();
    $alergias = $estudiante->getAlergias();
    $curso = $estudiante->getId_curso();

    $salida = array( 
      'nombre'=>$nombre,
      'apellido'=>$apellido,
      'dni'=>$dni,
      'curso' => $curso,
      'alergias' => $alergias,
      'dias'=>[$dias['lunes'],$dias['martes'],$dias['miercoles'],$dias['jueves'],$dias['viernes']],
      'nombre_usuario'=>$nombre_usuario,
      'habilitado'=>$estudiante->getHabilitado()
    );
    
    echo json_encode($salida);
    
}
?>