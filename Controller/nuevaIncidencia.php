<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {

    if (isset($_POST['tipo'])){

        $tipo = $_POST['tipo'];
        $ubicacion = $_POST['ubicacion'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $usuario = $_SESSION['user'];

        $incidencia = new Incidencia(null,$tipo,$ubicacion,$titulo,$descripcion, date('Y-m-d'), 0, $usuario);
        $incidencia->nuevaIncidencia();
        $validacion = true;

    } else {
        // Obtiene todos los tipos
        $data['tipos'] = Tipo::getTipos();

        // Obtiene todas las ubicaciones
        $data['ubicaciones'] = Ubicacion::getUbicaciones();
    }

    $data['textoTitulo'] = "Presentar nueva incidencia";

    include '../View/presentarIncidencia.php';

}