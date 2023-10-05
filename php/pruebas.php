<?php
include 'models/usuario.php';
include 'models/curso.php';
include 'lib/ddbb.php';
include 'models/diasacomer.php';

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
}

$usuario = Usuario::obtenerPorNombre("alamito");
if(!(is_null($usuario))){
    var_dump( $usuario );
    if($usuario->eliminar()){
        echo "eliminado";
    }else{
        echo "no eliminado";
    }
}else{
    echo "No existe el usuario";
}

//Prueba días a comer. 
_Notas:_ Notar que guardar() devuelve el ultimo $id y sino devuelve false de no poder guardarse. 
$diasacomer = new DiasAComer(0,0,1,1,1);
if($ult = $diasacomer->guardar()){
    echo "dias guardados";
    echo $ult;
    $diasacomer->setId($ult);
}else{
    echo "dias no guardados";
}
echo "<br />";
var_dump ($diasacomer);

if($diasacomer->actualizardias(1,1,0,1,0)){
    echo "Actualizada <br />";
    print_r($diasacomer->obtenerdias());
}else{
    echo "No actualizada";   
}
*/
?> 