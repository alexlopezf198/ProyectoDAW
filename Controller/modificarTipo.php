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

            $tipo = new Tipo($id, $nombre, $descripcion, $estaEliminado);
            $tipo->update();
            $validacion = true;

            // Recupero los datos actualizados para que el formulario no de errores al cargar el modal de validacion

            $data['tipoId'] = $id;
            $data['tipoNombre'] = $nombre;
            $data['tipoDescripcion'] = $descripcion;
            $data['tipoEstaEliminado'] = $estaEliminado;

        } else {

            // Obtiene los datos del tipo para mostrarlos en el formulario

            $data['tipoId'] = $_POST['tipoId'];
            $data['tipoNombre'] = $_POST['tipoNombre'];
            $data['tipoDescripcion'] = $_POST['tipoDescripcion'];
            $data['tipoEstaEliminado'] = $_POST['tipoEstaEliminado'];
        }

        $data['textoTitulo'] = "Modificar tipo";
        
        include '../View/editTipo.php';


    } else {

        header("location: ../index.php");

    }

}