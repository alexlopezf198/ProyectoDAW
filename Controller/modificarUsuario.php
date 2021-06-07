<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {

    $data['user'] = Usuario::getUsuarioById($_SESSION['user']);
    
    if ($data['user']->getEsAdmin()) {

        if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['provincia']) && isset($_POST['localidad']) && isset($_POST['fechanac'])) {

            // Obtengo todos los datos del formulario

            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $provincia = $_POST['provincia'];
            $localidad = $_POST['localidad'];
            $fechanac = $_POST['fechanac'];
            $estaEliminado = $_POST['estaEliminado'];

            if (isset($_POST['tecnico'])) {
                $esTecnico = 1;
            } else {
                $esTecnico = 0;
            }

            if (isset($_POST['admin'])) {
                $esAdmin = 1;
            } else {
                $esAdmin = 0;
            }

            if ($_POST['nuevaContrasenia']!="") {
                $contrasenia = password_hash($_POST['nuevaContrasenia'], PASSWORD_BCRYPT);
            } else {
                $contrasenia = $_POST['contrasenia'];
            }

            // Realizo las operaciones en la base de datos

            $usuario = new Usuario($dni, $nombre, $apellidos, $email, $provincia, $localidad, $fechanac, $contrasenia, $esTecnico, $esAdmin, $estaEliminado);
            $usuario->update();
            $validacion = true;

            // Recupero los datos actualizados para que el formulario no de errores al cargar el modal de validacion

            $data['usuarioId'] = $dni;
            $data['usuarioNombre'] = $nombre;
            $data['usuarioApellidos'] = $apellidos;
            $data['usuarioEmail'] = $email;
            $data['usuarioProvincia'] = $provincia;
            $data['usuarioLocalidad'] = $localidad;
            $data['usuarioFecha'] = $fechanac;
            $data['usuarioEsTecnico'] = $esTecnico;
            $data['usuarioEsAdmin'] = $esAdmin;
            $data['usuarioEstaEliminado'] = $estaEliminado;
            $data['usuarioContrasenia'] = $contrasenia;

        } else {

            // Obtiene los datos del usuario para mostrarlos en el formulario

            $data['usuarioId'] = $_POST['usuarioId'];
            $data['usuarioNombre'] = $_POST['usuarioNombre'];
            $data['usuarioApellidos'] = $_POST['usuarioApellidos'];
            $data['usuarioEmail'] = $_POST['usuarioEmail'];
            $data['usuarioProvincia'] = $_POST['usuarioProvincia'];
            $data['usuarioLocalidad'] = $_POST['usuarioLocalidad'];
            $data['usuarioFecha'] = $_POST['usuarioFecha'];
            $data['usuarioEsTecnico'] = $_POST['usuarioEsTecnico'];
            $data['usuarioEsAdmin'] = $_POST['usuarioEsAdmin'];
            $data['usuarioEstaEliminado'] = $_POST['usuarioEstaEliminado'];
            $data['usuarioContrasenia'] = $_POST['usuarioContrasenia'];
        }

       include '../View/editUsuario.php';


    } else {

        header("location: ../index.php");

    }

}