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

        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['estaEliminado'])) {

            // Obtengo todos los datos del formulario

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $estaEliminado = $_POST['estaEliminado'];            

            // Realizo las operaciones en la base de datos

            $ubicacion = new Ubicacion($id, $nombre, $descripcion, $estaEliminado);
            $ubicacion->update();
            $validacion = true;

            // Recupero los datos actualizados para que el formulario no de errores al cargar el modal de validacion

            $data['ubicacionId'] = $id;
            $data['ubicacionNombre'] = $nombre;
            $data['ubicacionDescripcion'] = $descripcion;
            $data['ubicacionEstaEliminado'] = $estaEliminado;

        } else {

            // Obtiene los datos de la ubicación para mostrarlos en el formulario

            $data['ubicacionId'] = $_POST['ubicacionId'];
            $data['ubicacionNombre'] = $_POST['ubicacionNombre'];
            $data['ubicacionDescripcion'] = $_POST['ubicacionDescripcion'];
            $data['ubicacionEstaEliminado'] = $_POST['ubicacionEstaEliminado'];
        }

        $data['textoTitulo'] = "Modificar ubicación";
        
        include '../View/editUbicacion.php';


    } else {

        header("location: ../index.php");

    }

}