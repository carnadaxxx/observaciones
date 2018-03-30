<?php

/*Esta clase controla el formulario de ingreso de observaciones*/

class FormNewObservacion extends Controller {

    function __construct(){

        parent::__construct();

    }

    public  function index() {

        $msg = "";

        if (isset($_POST['submit'])) {

            if (!empty($_POST['obstxt'])) {

                $idDocente = $_SESSION['sessionIdDocente'];

                $idProyecto = $_GET['id'];

                $observacion = filter_var($_POST['obstxt']);

                $Loader = new LoadModel("ObservacionesModel");

                $ObsModel = new ObservacionesModel();

                $addObservacion = $ObsModel->createNewObservacion($observacion, $idDocente, $idProyecto);

                $url = url_base()."index.php?controller=InfoProyect&id=".$idProyecto;

                header("Location: $url");

            } else {

                echo "esta basio";

            }


        } else {

            echo "algo salio mal";

        }




    }
}
