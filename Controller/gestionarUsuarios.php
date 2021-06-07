<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {

    $data['user'] = Usuario::getUsuariobyId($_SESSION['user']);
    
    if ($data['user']->getEsAdmin()) {

        if (isset($_POST['dniUsuario'])) {
            // Obtiene el usuario introducido en el filtro de Buscar
            $usuario = Usuario::getUsuarioById($_POST['dniUsuario']);
        } else if (isset($_POST['grupo'])) {

            // Obtiene los usuarios con el filtro de Grupo correspondiente
            if ($_POST['grupo']=="clientes") {
                $data['usuarios'] = Usuario::getUsuariosClientes();
            } else if ($_POST['grupo']=="tecnicos") {
                $data['usuarios'] = Usuario::getUsuariosTecnicos();
            } else if ($_POST['grupo']=="administradores") {
                $data['usuarios'] = Usuario::getUsuariosAdmins();
            }

        } else {
            // Obtiene todos los usuarios
            $data['usuarios'] = Usuario::getUsuarios();
        }

        include '../View/gestionUsuarios.php';


    } else {

        header("location: ../index.php");

    }

}