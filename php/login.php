<?php
session_start();
if (!isset($_SESSION['usuario'])){
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores enviados del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Realizar la verificación de inicio de sesión
        // Aquí debes implementar tu lógica para verificar las credenciales del usuario,
        // como consultar una base de datos, verificar contraseñas, etc.
    
        // Ejemplo básico de verificación de usuario y contraseña
        if ($username === 'usuario' && $password === 'contraseña') {
        // Inicio de sesión exitoso
        $_SESSION['usuario'] = $username; // Guardar el nombre de usuario en la variable de sesión
        $_SESSION['rol'] = 1;
        /***
         * Roles: 0 estudiante, 1 cocinera y 2 admin. 
         */
        header('Location: ../index.php'); // Redirigir a la página de inicio
        exit;
        } else {
        // Inicio de sesión fallido
        echo "error";
        $error = "Nombre de usuario o contraseña incorrectos";
        }
    }else{
        echo "No ingreso al post";
    }
}
?> 