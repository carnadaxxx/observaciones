<?php

/*
* Este es el controlador que va a manejar la pagina de la tesis
*/

class InfoProyect extends Controller {

    function __contruct() {

        parent::__construct();

    }

    public function index() {

        $idproyecto = $_GET["id"];

        $LoaderRes = new LoadModel("ResolucionModel");

        $LoaderObs = new LoadModel("ObservacionesModel");

        $ResModel = new ResolucionModel();

        $ObsModel = new ObservacionesModel();

        $infoProyect = $ResModel->getInfoOfProyectByIdProyecto($idproyecto);

        $resproyecto = $ResModel->getNumberOfResoltionByIdProyect($idproyecto);

        $informe = $ResModel->getInformeArchivoByIdProyecto($idproyecto);

        $observaciones = $ObsModel->getLisOfObservations($idproyecto);

        $hasFileOrNot = $ResModel->hasProyectoByIdProyecto($idproyecto);

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

        echo $twig->render('InfoProyect.twig', compact('projectName', 'saludo', 'tipoUsuario', 'nombre', 'idproyecto', 'infoProyect', 'resproyecto', 'informe', 'observaciones', 'hasFileOrNot'));


    }


}
