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
        $paginas_totales = Tipo::getPaginasTotales($cant_registros);

        if (isset($_POST['nombreTipo'])) {

            // Obtiene los tipos del filtro Buscar
            $data['tipos'] = Tipo::getTiposByNombre($_POST['nombreTipo']);

        } else {

            // Obtiene todos los tipos
            $data['tipos'] = Tipo::getTiposListarPaginacion($offset, $cant_registros);

        }

        include '../View/gestionTipos.php';


    } else {

        header("location: ../index.php");

    }

}