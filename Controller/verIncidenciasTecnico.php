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
    
    if ($data['user']->getEsTecnico()) {

        // Obtiene las incidencias atendidas por el técnico
        $data['incidencias'] = Incidencia::getIncidenciasAtendidas($data['user']->getDni());

        // Obtiene todos los tipos
        $data['tipos'] = Tipo::getTipos();

        // Obtiene todas las ubicaciones
        $data['ubicaciones'] = Ubicacion::getUbicaciones();

        // Filtra las incidencias

        if (isset($_POST['tipo'])) {

            $data['incidencias'] = Incidencia::getIncidenciasAtendidasFiltroTipo($data['user']->getDni(), $_POST['tipo']);

        } else if (isset($_POST['ubicacion'])) {

            $data['incidencias'] = Incidencia::getIncidenciasAtendidasFiltroUbicacion($data['user']->getDni(), $_POST['ubicacion']);
    
        }

        include '../View/incidenciasTecnico.php';

    } else {

        header("location: ../index.php");

    }

}