<?php

class Docente extends Controller {

    function __construct() {

        parent:: __construct();

    }


    public function index() {

        $Loader = new LoadModel("DocenteModel");

        $DocenteModel = new DocenteModel();

        $Docente = $DocenteModel->getDocente();

        $DocenteView = new View("docente/dashboard.php", compact("Docente"));


    }


}
