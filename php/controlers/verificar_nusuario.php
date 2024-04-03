<?php
include '../lib/ddbb.php';
include '../models/usuario.php';
if($_POST){
    $nombre_usuario = $_POST['nombre_usuario'];
    $usuario = Usuario::obtenerPorNombre($nombre_usuario);
    if($usuario == null){
        echo "1"; //NO existe usuario
    }else{
        echo "0"; //Existe usuario
    }
}
?>