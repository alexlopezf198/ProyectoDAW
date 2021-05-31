<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {

    $data['textoTitulo'] = "Modificar incidencia";

    // Obtiene todos los tipos
    $data['tipos'] = Tipo::getTipos();

    // Obtiene todas las ubicaciones
    $data['ubicaciones'] = Ubicacion::getUbicaciones();

    if (isset($_POST['id']) && isset($_POST['tipo']) && isset($_POST['ubicacion']) && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha']) && isset($_POST['estado'])) {

        // Obtiene los datos del formulario y modifica la incidencia

        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $ubicacion = $_POST['ubicacion'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $estado = $_POST['estado'];
        $usuario = $_SESSION['user'];

        $incidencia = new Incidencia($id, $tipo, $ubicacion, $titulo, $descripcion, $fecha, $estado, $usuario);

        $incidencia->modificaIncidencia();
        $validacionMod = true;

    } else {

        // Obtiene los datos de la incidencia

        $data['incidenciaId'] = $_POST['IdData'];
        $data['tipoId'] = $_POST['tipoData'];
        $data['ubicacionId'] = $_POST['ubicacionData'];
        $data['titulo'] = $_POST['tituloData'];
        $data['descripcion'] = $_POST['descripcionData'];
        $data['fecha'] = $_POST['fechaData'];
        $data['estado'] = $_POST['estadoData'];
    }

    include '../View/presentarIncidencia.php';

}