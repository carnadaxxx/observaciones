<?php

class RisingObservations extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        $projectName = getProjectName();

        $saludo = getSaludo();

        // Variables de Session

        $tipoUsuario = $_SESSION['sessionType'];

        $nombre =   $_SESSION['sessionNameTesista']." ".$_SESSION['sessionLastNameTesista'];

        $sessionIdT = $_SESSION['sessionIdTesista'];

        $ResIP = $_SESSION['sessionIdProyecto'];

        // endOF Variables de Session

        // Generador de variables de la BD

        $LoaderRes = new LoadModel("ResolucionModel");

        $LoaderObs = new LoadModel("ObservacionesModel");

        $ResModel = new ResolucionModel();

        $ObsModel = new ObservacionesModel();

        $hasProject = $ResModel->getHasProyecto($sessionIdT);

        $arrayObs = $ObsModel->getLisOfObservations($ResIP);

        // endOF Generador de variables de la BD

        $loader = new Twig_Loader_Filesystem('views/tesista/');

        $twig = new Twig_Environment($loader, []);

        echo $twig->render('risingObservations.twig', compact('projectName', 'saludo', 'nombre', 'tipoUsuario', 'hasProject', 'arrayObs'));


    }



}
