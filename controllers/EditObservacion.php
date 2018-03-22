<?php

class EditObservacion extends Controller {

    function __construct() {

        parent::__construct();

    }

    public function index() {

        /*
        * Datos para la plantilla
        */
        $projectName = getProjectName();

        $saludo = getSaludo();

        $tipoUsuario = $_SESSION['sessionType'];

        $nombre = $_SESSION['sessionNameDocente']." ".$_SESSION['sessionLastNameDocente'];

        /* Esta es la parte del twig */

        $loader = new Twig_Loader_Filesystem('views/docente/');

        $twig = new Twig_Environment($loader, []);

        echo $twig->render('EditObservacion.twig', compact('projectName', 'saludo', 'tipoUsuario', 'nombre'));

    }


}
