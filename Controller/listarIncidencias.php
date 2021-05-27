<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {
        
    // Obtiene todas las incidencias
    $data['incidencias'] = Incidencia::getIncidencias();

    // Obtiene todos los tipos
    $data['tipos'] = Tipo::getTipos();

    // Obtiene todas las ubicaciones
    $data['ubicaciones'] = Ubicacion::getUbicaciones();

    // Filtra las incidencias

    if (isset($_POST['tipo'])) {

        $data['incidencias'] = Incidencia::getIncidenciasFiltroTipo($_POST['tipo']);

    } else if (isset($_POST['ubicacion'])) {

        $data['incidencias'] = Incidencia::getIncidenciasFiltroUbicacion($_POST['ubicacion']);

    }
        
    include '../View/incidencias.php';    

}