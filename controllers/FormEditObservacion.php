<?php

/**
 * Esta clase es la que controla el formulario para editar el estado
 * de la observacion
 */
class FormEditObservacion extends Controller {

    function __construct(){

        parent::__construct();

    }

    public function index() {

        $msg = "";

        if (isset($_POST['submit'])) {

            if ($_POST['selectEstado'] != "" ) {

                $idObservacion = $_GET['id'];

                $valueObs = $_POST['selectEstado'];


                $LoaderObs = new LoadModel("ObservacionesModel");

                $ObsModel = new ObservacionesModel();

                $editIbservacion = $ObsModel->editraObservacionEstadoByIdObservacion($idObservacion, $valueObs);

                $idProyecto = $ObsModel->getIDProyectoByIdObservacion($idObservacion);

                $url = url_base()."index.php?controller=InfoProyect&id=".$idProyecto;

                header("Location: $url");

            } else {

                echo "Tienes que seleccionar una opcion";

            }




        } else {

            echo "esta basio";

        }



    }
}
