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

    // Cambio de rol (para el botón)

    if (isset($_POST['cambiarRol'])) {
        unset($_SESSION['rol']);
    }

    // Recupero datos del usuario
    
    $data['user'] = Usuario::getUsuariobyId($_SESSION['user']);
    $data['nombre'] = $data['user']->getNombre();
    $data['apellidos'] = $data['user']->getApellidos();

    // Compruebo los permisos del usuario y le muestro las vistas correspondientes dependiendo de su rol

    if (!$data['user']->getEsTecnico() && !$data['user']->getEsAdmin()) {

        $data['user'] = Usuario::getUsuariobyId($_SESSION['user']);
        $data['nombre'] = $data['user']->getNombre();
        $data['apellidos'] = $data['user']->getApellidos();
        include '../View/cliente.php';

    } else if ($data['user']->getEsTecnico() && !$data['user']->getEsAdmin()) {

        if (isset($_SESSION['rol'])) {

            if ($_SESSION['rol']=="tecnico") {
                include '../View/tecnico.php';
            } else if ($_SESSION['rol'] =="cliente") {
                include '../View/cliente.php';
            }

        } else {

            if (isset($_POST['rol'])) {
                $_SESSION['rol'] = $_POST['rol'];
                header("refresh: 0;");
            } else {
                include '../View/selectRol.php';
            }
        }

        

    } else if ($data['user']->getEsAdmin()) {

        if (isset($_SESSION['rol'])) {

            if ($_SESSION['rol']=="admin") {
                include '../View/admin.php';
            } else if ($_SESSION['rol'] =="tecnico") {
                include '../View/tecnico.php';
            } else if ($_SESSION['rol'] =="cliente") {
                include '../View/cliente.php';
            }

        } else {

            if (isset($_POST['rol'])) {
                $_SESSION['rol'] = $_POST['rol'];
                header("refresh: 0;");
            } else {
                include '../View/selectRol.php';
            }
        }
        
    }
    
}