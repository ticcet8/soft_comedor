<?php

if($_POST){
    // Obtener los valores enviados por la solicitud AJAX
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí puedes realizar la verificación del inicio de sesión según tus necesidades
    // Por ejemplo, puedes consultar una base de datos para validar las credenciales

    // Ejemplo básico de verificación (no recomendado para uso en producción)
    if ($username === 'usuario' && $password == 'contraseña') {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }


    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?> 