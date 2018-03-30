<?php

class NewObservacion extends Controller {

    function __construct() {

        parent::__construct();

    }

    public function index() {

        $idObservacion = $_GET['id'];

        $LoaderObs = new LoadModel("ObservacionesModel");

        $ObsModel = new ObservacionesModel();

        $idProyecto = $ObsModel->getIDProyectoByIdObservacion($idObservacion);

        $resolucion = $ObsModel->getNroResolucionByidObservacion($idObservacion);

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

        echo $twig->render('NewObservacion.twig', compact('projectName', 'saludo', 'tipoUsuario', 'nombre', 'idProyecto', 'resolucion', 'idObservacion'));



    }


}
