<?php
session_start();
session_destroy(); // destruye la sesion
if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie("user", NULL, -1); // destruye la cookie de sesión
}
if (isset($_COOKIE['rol'])) {
    unset($_COOKIE['rol']);
    setcookie("rol", NULL, -1); // destruye la cookie de rol
}
header("location: ../index.php"); // refresca la página