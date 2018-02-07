<?php

    require("core/Config.php");
    require("core/Controller.php");

    /*
    *Aqui es donde se va a recoger el nombre del controlador y se va a redirigir
    *al controlador correcto si no encoentra el correcto te deberia redirigir
    *al inicio en este caso el valor inicial de $default_controller
    */

    if ($_GET && isset($_GET['controller'])) {

        $default_controller = $_GET['controller'];

        if (file_exists("controllers/".$default_controller.".php")) {

            require("controllers/".$default_controller.".php");

        } else {

            die("404.3 controlador no encontrado");

        }


    } else {

        require("controllers/".$default_controller.".php");

    }

    $Codestack = new $default_controller();
