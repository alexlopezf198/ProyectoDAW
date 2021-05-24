<?php
session_start();
session_destroy(); //destruye la sesion
header("location: ../index.php"); // refresca la página