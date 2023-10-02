<?php
include 'models/usuario.php';
include 'models/curso.php';
include 'lib/ddbb.php';

/***
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
 */
$curso = new Curso('1°2°CSTM');
if($curso->guardar()){
    echo "<br>Curso Guardado<hr>";
}

?>