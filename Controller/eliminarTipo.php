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

        if (isset($_POST['tipoId'])) {

            $tipoEliminado = Tipo::getTipoById($_POST['tipoId']);
            $tipoEliminado->eliminarTipo();
            header("location: ../Controller/gestionarTipos.php");

        } else {
            header("location: ../index.php");
        }


    } else {

        header("location: ../index.php");

    }

}