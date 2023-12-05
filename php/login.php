<?php
include_once 'models/usuario.php';
include 'lib/ddbb.php';
session_start();
if (!isset($_SESSION['usuario'])){
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores enviados del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        /**Creo un usuario con username y password */
        $usuario = new Usuario($username,$password);
        $inicio_sesion = $usuario->iniciar_sesion();

        // Realizar la verificación de inicio de sesión
        // Aquí debes implementar tu lógica para verificar las credenciales del usuario,
        // como consultar una base de datos, verificar contraseñas, etc.
    
        // Ejemplo básico de verificación de usuario y contraseña
        
        if ($inicio_sesion['error']==0) {
        // Inicio de sesión exitoso
            $_SESSION['usuario'] = $username; // Guardar el nombre de usuario en la variable de sesión
            $_SESSION['rol'] = $inicio_sesion['rol'];
            /***
             * Roles: 0 estudiante, 1 cocinera y 2 admin. 
             */
            header('Location: ../index.php'); // Redirigir a la página de inicio
            exit;
        } else {
        // Inicio de sesión fallido
            $error = $inicio_sesion['msj_error'];
            echo $error;
            echo "<br/><a href='../index.php'><button>Volver</button></a>";
            //sleep(3);
            //header('Location: ../index.php');
        }
    }else{
        echo "No ingreso al post";
    }
}
?> 