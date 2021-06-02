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

        if (isset($_POST['incidenciaId'])) {

            $tecnicoId = $_SESSION['user'];
            $incidenciaId = $_POST['incidenciaId'];

            // Actualiza el técnico que lleva la incidencia
            $incidencia = Incidencia::getIncidenciaById($incidenciaId);
            $incidencia->desatiendeIncidencia();

            // Valida la operación para mostrar el modal
            $validacion = true;

            // Obtiene todos los datos necesarios para la vista
            $data['incidencias'] = Incidencia::getIncidenciasAtendidas($data['user']->getDni());
            $data['tipos'] = Tipo::getTipos();
            $data['ubicaciones'] = Ubicacion::getUbicaciones();
            if (isset($_POST['tipo'])) {

                $data['incidencias'] = Incidencia::getIncidenciasAtendidasFiltroTipo($data['user']->getDni(), $_POST['tipo']);

            }

            include '../View/incidenciasTecnico.php';

        }

    } else {

        header("location: ../index.php");

    }

}