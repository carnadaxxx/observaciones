<?php

/*
* Esta es el controlador que maneja el dashboard de docente
*/

class Docente extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        if (isset($_SESSION['loggedin'])) {

            $sessionIdD = $_SESSION['sessionIdDocente'];

            if ($_SESSION['sessionType'] == "Docente") {

                $LoaderD = new LoadModel("DocenteModel");

                $LoaderR = new LoadModel("ResolucionModel");

                $DocenteModel = new DocenteModel();

                $ResModel = new ResolucionModel();

                $ProjectListArray = $ResModel->getListOfProyectByDocente($sessionIdD);

                $Docente = $DocenteModel->getDocente($sessionIdD);

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

                echo $twig->render('dashboard.twig', compact('projectName', 'saludo', 'tipoUsuario', 'nombre', 'ProjectListArray', 'sessionIdD'));


            } else {

                $DocenteView = new Layout("errors/noAutho.php");

            }

        } else {

            header("Location: ../index.php");

            exit();

        }





    }

}
