<?php

/*
* Este es el controlador que va a manejar la pagina de la tesis
*/

class InfoProyect extends Controller {

    function __contruct() {


    }

    public function index() {

        $idproyecto = $_GET["id"];

        $LoaderRes = new LoadModel("ResolucionModel");

        $ResModel = new ResolucionModel();

        $infoProyect = $ResModel->getInfoOfProyectByIdProyecto($idproyecto);

        $resproyecto = $ResModel->getNumberOfResoltionByIdProyect($idproyecto);

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

        echo $twig->render('InfoProyect.twig', compact('projectName', 'saludo', 'tipoUsuario', 'nombre', 'idproyecto', 'infoProyect', 'resproyecto'));


    }


}
