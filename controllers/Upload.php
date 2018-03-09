<?php
    /*
    * Esta clase es la que maneja toda la logica desde el servidor
    * para la subida de archivos.
    *
    * Esta es para la subida del informe inicial
    */
class Upload extends Controller {

    function __construct() {

        parent::__construct();

    }

    public function index() {

        if (isset($_FILES['fileupload'])) {

            $msg = "";

            $idUsuario = $_SESSION['sessionIdTesista'];

            $Loader = new LoadModel("ResolucionModel");

            $ResModel = new ResolucionModel();

            $foldername = $ResModel->getNumberOfResolution($idUsuario);

            $targetFile = "uploaded/".$foldername[0]['pyresolucion_nro']."/".basename($_FILES['fileupload']['name'][0]);

            if (file_exists($targetFile)) {

                $msg = array("status" => 0, "msg" => "El proyecto ya existe");

                exit(json_encode($msg));

            } else {

                mkdir('./uploaded/'.$foldername[0]['pyresolucion_nro'].'/', 0777);

                move_uploaded_file($_FILES['fileupload']['tmp_name'][0], $targetFile);

                try {

                    $ResModel->putResolucionFile($idUsuario, $targetFile);

                } catch (PDOException $e) {

                    $msg = array("status" => 0, "msg" => "error en la consulta: ".$e->getMessage(), "path" => $targetFile);

                    exit(json_encode($msg));

                }

                $msg = array("status" => 1, "msg" => "El proyecto se a subido con exito", "path" => $targetFile);

                exit(json_encode($msg));
            }

        } else {

            $msg = array("status" => 0, "msg" => "Algo salio terriblemente mal.");

            exit(json_encode($msg));

        }

    }

}
