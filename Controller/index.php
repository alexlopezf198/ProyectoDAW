<?php
session_start();
//comprueba si el usuario ha iniciado sesion
if (!isset($_SESSION['dni'])) {
    if (isset($_POST['dni'])) {
        $_SESSION['dni']=$_POST['dni'];
        header("refresh: 0;");
    }else{
        include '../View/acceso.php';
    }
}