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

        // Paginación del listado

        if (isset($_GET['p'])) {
            $pagina = $_GET['p'];
        } else {
            $pagina = 1;
        }
        $cant_registros = 10;
        $offset = ($pagina-1) * $cant_registros;
        $paginas_totales = Ubicacion::getPaginasTotales($cant_registros);

        if (isset($_POST['nombreUbicacion'])) {

            // Obtiene las ubicaciones del filtro Buscar
            $data['ubicaciones'] = Ubicacion::getUbicacionesByNombre($_POST['nombreUbicacion']);

        } else {

            // Obtiene todas las ubicaciones
            $data['ubicaciones'] = Ubicacion::getUbicacionesListarPaginacion($offset, $cant_registros);

        }

        include '../View/gestionUbicaciones.php';


    } else {

        header("location: ../index.php");

    }

}