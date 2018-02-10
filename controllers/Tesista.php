<?php

class Tesista extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        $Loader = new LoadModel("TesistaModel");

        $TesistaModel = new TesistaModel();

        $Tesistas = $TesistaModel->getTesista();

        $TesistaView = new View("tesista/dashboard.php", compact("Tesistas"));



    }

}
