<?php
session_start();

class Tesista extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        $sessionIdT = $_SESSION['sessionIdTesista'];

        if ($_SESSION['sessionType'] == "Tesista") {

            $Loader = new LoadModel("TesistaModel");

            $TesistaModel = new TesistaModel();

            $Tesista = $TesistaModel->getTesista($sessionIdT);

            $TesistaView = new Layout("tesista/dashboard.php", compact("Tesista"));

        } else {

            $TesistaView = new Layout("errors/noAutho.php");

        }

    }

}
