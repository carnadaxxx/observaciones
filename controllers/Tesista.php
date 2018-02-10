<?php

class Tesista extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        $Loader = new LoadModel("TesistaModel");

        $TesistaModel = new TesistaModel();

        $Tesista = $TesistaModel->getTesista();

        $TesistaView = new Layout("tesista/dashboard.php", compact("Tesista"));



    }

}
