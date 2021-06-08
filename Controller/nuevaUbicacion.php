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

        if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {

            // Obtengo todos los datos del formulario

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];      

            // Realizo las operaciones en la base de datos

            $ubicacion = new Ubicacion(0, $nombre, $descripcion);
            $ubicacion->insert();
            $validacionNuevo = true;
        }

        $data['textoTitulo'] = "Crear nueva ubicación";

        include '../View/editUbicacion.php';


    } else {

        header("location: ../index.php");

    }

}