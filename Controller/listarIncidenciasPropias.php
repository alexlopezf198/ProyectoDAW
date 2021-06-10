<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {
    
    // Paginación del listado

    if (isset($_GET['p'])) {
        $pagina = $_GET['p'];
    } else {
        $pagina = 1;
    }
    $cant_registros = 10;
    $offset = ($pagina-1) * $cant_registros;

    // Obtiene las incidencias del usuario
    $data['dni'] = $_SESSION['user'];
    $data['incidencias'] = Incidencia::getIncidenciasByUsuarioPaginacion($data['dni'], $offset, $cant_registros);
    $paginas_totales = Incidencia::getPaginasTotalesIncPropias($data['dni'], $cant_registros);

    // Obtiene todos los tipos
    $data['tipos'] = Tipo::getTipos();

    // Obtiene todas las ubicaciones
    $data['ubicaciones'] = Ubicacion::getUbicaciones();

    // Filtra las incidencias

    if (isset($_POST['tipo'])) {

        $data['incidencias'] = Incidencia::getIncidenciasByUsuarioFiltroTipo($data['dni'], $_POST['tipo']);

    } else if (isset($_POST['ubicacion'])) {

        $data['incidencias'] = Incidencia::getIncidenciasByUsuarioFiltroUbicacion($data['dni'], $_POST['ubicacion']);

    }
        
    include '../View/incidenciasPropias.php';    

}