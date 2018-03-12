<?php

    class InformeUpload extends Controller {

        function __construct() {

            parent:: __construct();

        }

        public function index() {

            $projectName = getProjectName();

            $saludo = getSaludo();

            $tipoUsuario = $_SESSION['sessionType'];

            $idUsuario = $_SESSION['sessionIdTesista'];

            $nombre =   $_SESSION['sessionNameTesista']." ".$_SESSION['sessionLastNameTesista'];

            $Loader = new LoadModel("ResolucionModel");

            $ResModel = new ResolucionModel();

            $proyectoDir = $ResModel->getHasProyecto($idUsuario);

            $proyectoArc = $ResModel->getProyectoArchivo($idUsuario);

            $loader = new Twig_Loader_Filesystem('views/tesista/');

            $twig = new Twig_Environment($loader, []);

            echo $twig->render('informeUpload.twig', compact('projectName', 'saludo', 'nombre', 'tipoUsuario', 'proyectoDir', 'proyectoArc'));


        }

    }
