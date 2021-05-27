<?php
session_start();
require_once '../Model/Usuario.php';
require_once '../Model/Tipo.php';
require_once '../Model/Ubicacion.php';
require_once '../Model/Incidencia.php';

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
} else {
        
    // Obtiene todas las incidencias
    $data['incidencias'] = Incidencia::getIncidencias();    
        
    include '../View/incidencias.php';    

}

    //     // Obtiene las incidencias del usuario
    //     $data['user'] = Usuario::getUsuariobyId($_SESSION['user']);
    //     $data['dni'] = $data['user']->getDni();
    //     $data['incidencias'] = Incidencia::getIncidenciasByUsuario($data['dni']);