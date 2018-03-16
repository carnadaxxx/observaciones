<?php

class ResolvObservacion extends Controller {

   function __construct() {

       parent::__construct();

   }

   public function index() {

        $url = $_GET['id'];

        // Datos de la pantalla

        $projectName = getProjectName();

        $tipoUsuario = $_SESSION['sessionType'];

        // Configuracion de twig

        $loader = new Twig_Loader_Filesystem('views/tesista/');

        $twig = new Twig_Environment($loader, []);

        echo $twig->render('resolvObservacion.twig', compact('projectName', 'tipoUsuario', 'url'));

   }



}
