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

        if (isset($_POST['nombreTipo'])) {

            // Obtiene los tipos del filtro Buscar
            $data['tipos'] = Tipo::getTiposByNombre($_POST['nombreTipo']);

        } else {

            // Obtiene todos los tipos
            $data['tipos'] = Tipo::getTiposListar();

        }

        include '../View/gestionTipos.php';


    } else {

        header("location: ../index.php");

    }

}