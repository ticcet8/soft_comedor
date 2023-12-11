<?php
include '../lib/ddbb.php';
include '../models/diasacomer.php';
include '../models/usuario.php';
include '../models/estudiante.php';
/***Archivo para agregar estudiantes */
if($_POST){
    $dni = $_POST['dni'];
    $estudiante = Estudiante::obtenerPorDNI($dni);
    $dias = DiasAComer::obtenerPorId($estudiante->getId_dias());
    $usuario = Usuario::obtenerPorId($estudiante->getId_usuario());
    $nombre_usuario = $usuario->getNombreUsuario();

    $salida = "";
    
    $salida .= "<table class='table'>";
    $salida .= "<tr>";
    $salida .= "<th>DNI: </th><td>".$dni."</td>";
    $salida .= "</tr>";
    $salida .= "<tr>";
    $salida .= "<th>Nombre: </th><td>".$estudiante->getNombre()."</td>";
    $salida .= "</tr>";
    $salida .= "<tr>";
    $salida .= "<th>Apellido: </th><td>".$estudiante->getApellido()."</td>";
    $salida .= "</tr>";
    
    $salida .= "<tr>";
    $salida .= "<th>Nombre de Usuario: </th><td>".$nombre_usuario."</td>";
    $salida .= "</tr>";

    $salida .= "<tr>";
    $salida .= "<th>Dias y Horarios: </th>";
    if (count($dias)>0) {
        $salida.= '<td>';
          if($dias['lunes']=='1'){
            $salida.= "Lunes - 11.15hs ";
          }
          if($dias['lunes']=='2'){
            $salida.= "Lunes - 12.20hs ";
          }
          if($dias['lunes']=='2'){
            $salida.= "Lunes - 13.00hs ";
          }
          if($dias['martes']=='1'){
            $salida.= "Martes - 11.15hs ";
          }
          if($dias['martes']=='2'){
            $salida.= "Martes - 12.20hs ";
          }
          if($dias['martes']=='2'){
            $salida.= "Martes - 13.00hs ";
          }
          if($dias['miercoles']=='1'){
            $salida.= "Miércoles - 11.15hs ";
          }
          if($dias['miercoles']=='2'){
            $salida.= "Miércoles - 12.20hs ";
          }
          if($dias['miercoles']=='2'){
            $salida.= "Miércoles - 13.00hs ";
          }
          if($dias['jueves']=='1'){
            $salida.= "Jueves - 11.15hs ";
          }
          if($dias['jueves']=='2'){
            $salida.= "Jueves - 12.20hs ";
          }
          if($dias['jueves']=='2'){
            $salida.= "Jueves - 13.00hs ";
          }
          if($dias['viernes']=='1'){
            $salida.= "Viernes - 11.15hs ";
          }
          if($dias['viernes']=='2'){
            $salida.= "Viernes - 12.20hs ";
          }
          if($dias['viernes']=='2'){
            $salida.= "Viernes - 13.00hs ";
          }
          $salida.= '</td>';
      }
    $salida .= "</tr>";
    $salida .= "<tr>";
    $salida .= "<th>Habilitado: </th><td>".($estudiante->getHabilitado()==1?'Si':'No')."</td>";
    $salida .= "</tr>";
    $salida .= "</table>";
    
    echo $salida;
    
}
?>