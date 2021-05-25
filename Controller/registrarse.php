<?php
session_start();
require_once '../Model/Usuario.php';

//comprueba si el usuario ha iniciado sesion
if (!isset($_SESSION['user'])) {

    if (isset($_POST['dni'])) {

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $provincia = $_POST['provincia'];
        $localidad = $_POST['localidad'];
        $fechaNacimiento = $_POST['fechanac'];
        $contrasenia = $_POST['contrasenia'];
        

        if (Usuario::existeDni($dni)) {
            $dni_error = "El dni ya está registrado";

            if (Usuario::existeEmail($email)) {
                $email_error = "El email ya está registrado";
            }

        } else if (Usuario::existeEmail($email)) {
            $email_error = "El email ya está registrado";
        } else{
            $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);
            $usuario = new Usuario($dni, $nombre, $apellidos, $email, $provincia, $localidad, $fechaNacimiento, $contraseniaHash, false, false);
            $usuario->insert();
            $validacion = true;
        }

    }

    include '../View/registro.php';
    
}else{
    header("Location: ../index.php"); 
}