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

        // Obtiene las incidencias que están en trámite
        $data['incidencias'] = Incidencia::getIncidenciasTramite();

        // Obtiene todos los tipos
        $data['tipos'] = Tipo::getTipos();

        // Obtiene todas las ubicaciones
        $data['ubicaciones'] = Ubicacion::getUbicaciones();

        // Filtra las incidencias

        if (isset($_POST['tipo'])) {

            $data['incidencias'] = Incidencia::getIncidenciasTramiteFiltroTipo($_POST['tipo']);

        }

        include '../View/incidenciasRegistradas.php';

    } else {

        header("location: ../index.php");

    }

}