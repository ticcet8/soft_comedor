<?php
include 'models/usuario.php';
include 'models/curso.php';
include 'lib/ddbb.php';

/***
 * Prueba iniciar sesión y guardar
$usuario = new Usuario('alamito','alam');
$us = $usuario->iniciar_sesion();
print_r($us);
if ($us['error'] == 1){
    if($usuario->guardar()){
        echo "guardado";
    }else{
        echo "no guardado";
    }
}else{
    echo "inicio sesión";
}
// Prueba de guardado 
$usuario = new Usuario('alamito','alam');
if($usuario->guardar()){
    echo "guardado";
}else{
    echo "no guardado";
}


*/
/***
 * 
$curso = new Curso('1°3°CSTM');

if($curso->guardar()){
    echo "<br>Curso Guardado<hr>";
}else{
    echo "<br>Curso No Guardado<hr>";
}

if($curso->actualizar('1°3°CSTM')){
    echo "<br>Curso Guardado<hr>";
}else{
    echo "<br>Curso No Guardado<hr>";
}
 

if($curso->eliminar()){
    echo "<br>Curso Eliminado<hr>";
}else{
    echo "<br>Curso No Eliminado<hr>";
}


$usuario = new Usuario('alamito','alam');
if($usuario->guardar()){
    echo "guardado";
}else{
    echo "no guardado";
}*/
?> 