<?php

if (isset($_GET['p'])){

    if ($_GET['p']=="1") {

        include '../View/ayuda1.php';

    } else if ($_GET['p']=="2") {

        include '../View/ayuda2.php';

    } else if ($_GET['p']=="3") {

        include '../View/ayuda3.php';

    } else if ($_GET['p']=="4") {

        include '../View/ayuda4.php';

    } else if ($_GET['p']=="5") {

        include '../View/ayuda5.php';

    }

} else {
    include '../View/ayuda.php';
}