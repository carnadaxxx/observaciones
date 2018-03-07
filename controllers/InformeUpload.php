<?php

    class InformeUpload extends Controller {

        function __construct() {

            parent:: __construct();

        }

        public function index() {

            $projectName = getProjectName();

            $saludo = getSaludo();

            $tipoUsuario = $_SESSION['sessionType'];

            $nombre =   $_SESSION['sessionNameTesista']." ".$_SESSION['sessionLastNameTesista'];

            $loader = new Twig_Loader_Filesystem('views/tesista/');

            $twig = new Twig_Environment($loader, []);

            echo $twig->render('informeUpload.twig', compact('projectName', 'saludo', 'nombre', 'tipoUsuario'));


        }

    }
