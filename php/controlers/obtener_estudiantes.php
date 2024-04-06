<?php
include '../lib/ddbb.php';
include '../models/diasacomer.php';
include '../models/usuario.php';
include '../models/estudiante.php';
if(!$_GET){
    $estudiantes = Estudiante::getEstudiantes();
    $html = "";
    foreach ($estudiantes as $e) {
        $us = Usuario::obtenerPorId($e->getId_usuario());
        $nombre_usuario = $us->getNombreUsuario();
        $html .=  "<tr>";
        $html .=  '<td>' .$e->getNombre(). '</td>';
        $html .=  '<td>' .$e->getApellido(). '</td>';
        $html .=  '<td>' .$nombre_usuario. '</td>';
        $dias = DiasAComer::obtenerPorId($e->getId_dias());
        $habilitado = $e->getHabilitado();
        if($habilitado == 1){
            $html .=  '<td>Habilitado</td>';
        }else{
            $html .=  '<td>No habilitado</td>';
        }
        if (count($dias)>0) {
            $html .=  '<td>';
            if($dias['lunes']!='0'){
                $html .=  "L - ";
            }
            if($dias['martes']!='0'){
                $html .=  "M - ";
            }
            if($dias['miercoles']!='0'){
                $html .=  "X -";
            }
            if($dias['jueves']!='0'){
                $html .=  " J -";
            }
            if($dias['viernes']!='0'){
                $html .=  "V";
            }
            $html .=  '</td>';
        }
        $dni = $e->getDni();
        $html .=  '<td> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verEstudiante" data-id="'.$dni.'" ">Ver</button>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modificarEstudiante" data-id="'.$dni.'" ">Modificar</button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarEstudiante" data-id="'.$dni.'">Eliminar</button></td></tr>';
    }

    echo $html;
}else{
    $clave = $_GET['buscador'];
    $estudiantes = Estudiante::obtenerPorNombreODNI($clave);
    $html = "";
    foreach ($estudiantes as $e) {
        $us = Usuario::obtenerPorId($e->getId_usuario());
        $nombre_usuario = $us->getNombreUsuario();
        $html .=  "<tr>";
        $html .=  '<td>' .$e->getNombre(). '</td>';
        $html .=  '<td>' .$e->getApellido(). '</td>';
        $html .=  '<td>' .$nombre_usuario. '</td>';
        $dias = DiasAComer::obtenerPorId($e->getId_dias());
        $habilitado = $e->getHabilitado();
        if($habilitado == 1){
            $html .=  '<td>Habilitado</td>';
        }else{
            $html .=  '<td>No habilitado</td>';
        }
        if (count($dias)>0) {
            $html .=  '<td>';
            if($dias['lunes']!='0'){
                $html .=  "L - ";
            }
            if($dias['martes']!='0'){
                $html .=  "M - ";
            }
            if($dias['miercoles']!='0'){
                $html .=  "X -";
            }
            if($dias['jueves']!='0'){
                $html .=  " J -";
            }
            if($dias['viernes']!='0'){
                $html .=  "V";
            }
            $html .=  '</td>';
        }
        $dni = $e->getDni();
        //eliminarEstudiante
        $html .=  '<td> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verEstudiante" data-id="'.$dni.'" ">Ver</button>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modificarEstudiante" data-id="'.$dni.'" ">Modificar</button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarEstudiante" data-id="'.$dni.'">Eliminar</button></td></tr>';
    }

    echo $html;
}
?>