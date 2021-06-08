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

        if (isset($_POST['ubicacionId'])) {

            $ubicacionEliminado = Ubicacion::getUbicacionById($_POST['ubicacionId']);
            $ubicacionEliminado->eliminarUbicacion();
            header("location: ../Controller/gestionarUbicaciones.php");

        } else {
            header("location: ../index.php");
        }


    } else {

        header("location: ../index.php");

    }

}