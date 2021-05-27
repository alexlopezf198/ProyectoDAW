<?php
session_start();
require_once '../Model/Usuario.php';

//comprueba si el usuario ha iniciado sesion
if (!isset($_SESSION['user'])) {
    if (isset($_POST['dni']) && isset($_POST['password'])) {


        if (Usuario::existeDni($_POST['dni'])){

            $usuario = Usuario::getUsuarioById($_POST['dni']);
            $contrasenia = $_POST['password'];
            $contraseniaHash = $usuario->getContrasenia();

            if (password_verify($contrasenia, $contraseniaHash)) {
                $_SESSION['user']=$_POST['dni'];
                $_SESSION['password']=$_POST['password'];
                // Mensaje login correcto
                header("refresh: 0;");

            } else {
                $pass_error = "La contraseña es incorrecta";
                include '../View/acceso.php';
            }

        } else {
            $dni_error = "El dni introducido no existe";
            include '../View/acceso.php';
        }

    }else{
        include '../View/acceso.php';
    }
} else {
    $usuario = Usuario::getUsuarioById($_SESSION['user']);

    if (!$usuario->getEsTecnico() && !$usuario->getEsAdmin()) {

        $data['user'] = Usuario::getUsuariobyId($_SESSION['user']);
        $data['nombre'] = $data['user']->getNombre();
        $data['apellidos'] = $data['user']->getApellidos();
        include '../View/cliente.php';

    } else if ($usuario->getEsTecnico() && !$usuario->getEsAdmin()) {

        // include '../View/tecnico.php';

    } else if ($usuario->getEsAdmin()) {

        // include '../View/admin.php';
        
    }
    
}