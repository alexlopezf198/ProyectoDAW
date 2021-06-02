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

            $incidencia = Incidencia::getIncidenciaById($_POST['incidenciaId']);

            if (isset($_POST['estadoform'])) {

                $incidencia->setEstado($_POST['estadoform']);
                $incidencia->update();
                header("location: ../Controller/verIncidenciasTecnico.php");

            } else {

                include '../View/selectEstado.php';

            }

        } else {

            header("location: ../index.php");

        }

    } else {

        header("location: ../index.php");

    }

}