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

        if (isset($_POST['nombreUbicacion'])) {

            // Obtiene las ubicaciones del filtro Buscar
            $data['ubicaciones'] = Ubicacion::getUbicacionesByNombre($_POST['nombreUbicacion']);

        } else {

            // Obtiene todas las ubicaciones
            $data['ubicaciones'] = Ubicacion::getUbicacionesListar();

        }

        include '../View/gestionUbicaciones.php';


    } else {

        header("location: ../index.php");

    }

}