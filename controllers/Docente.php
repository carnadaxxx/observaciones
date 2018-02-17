<?php
session_start();

class Docente extends Controller {

    function __construct() {

        parent:: __construct();

    }

    public function index() {

        if (isset($_SESSION['loggedin'])) {

            $sessionIdD = $_SESSION['sessionIdDocente'];

            if ($_SESSION['sessionType'] == "Docente") {

                $Loader = new LoadModel("DocenteModel");

                $DocenteModel = new DocenteModel();

                $Docente = $DocenteModel->getDocente($sessionIdD);

                $DocenteView = new Layout("docente/dashboard.php", compact("Docente"));

            } else {

                $DocenteView = new Layout("errors/noAutho.php");

            }

        } else {

            header("Location: ../index.php");

            exit();
            
        }





    }

}
