<?php

class Tesista extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        if (isset($_SESSION['loggedin'])) {

            $sessionIdT = $_SESSION['sessionIdTesista'];

            if ($_SESSION['sessionType'] == "Tesista") {

                $Loader = new LoadModel("TesistaModel");

                $TesistaModel = new TesistaModel();

                $Tesista = $TesistaModel->getTesisInfo($sessionIdT);

                /*
                * Datos para la plantilla
                * TODO: Tengo que ver la forma de hacer que esta parte sea dinamica
                */
                $projectName = getProjectName();

                $saludo = getSaludo();

                $tipoUsuario = $_SESSION['sessionType'];

                $nombre =   $_SESSION['sessionNameTesista']." ".$_SESSION['sessionLastNameTesista'];

                /* Esta es la parte del twig */

                $loader = new Twig_Loader_Filesystem('views/tesista/');

                $twig = new Twig_Environment($loader, []);

                echo $twig->render('dashboard.twig', compact('projectName', 'saludo', 'nombre', 'tipoUsuario', 'Tesista' ));

            } else {

                $TesistaView = new Layout("errors/noAutho.php");

            }

        } else {

            header("Location: ../index.php");

            exit();

        }

    }

}
