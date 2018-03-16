<?php

    /*
    * Esta clase es la que maneja toda la logica desde el servidor
    * para la subida de archivos.
    *
    * Esta es para la subida del informe final
    */

    class ObservacionForm extends Controller {

        function __construct() {

            parent::__construct();

        }

        public function index() {

            $msg = "";

            if (isset($_POST['submit'])) {

                if ($_FILES['type'] = "application/pdf") {

                    $idUsuario = $_SESSION['sessionIdTesista'];

                    $idObservacion = $_GET['id'];

                    $Post = $_POST['obsText'];

                    $Loader = new LoadModel("ResolucionModel");

                    $ResModel = new ResolucionModel();

                    $foldername = $ResModel->getNumberOfResolution($idUsuario);

                    $files = $_FILES['obsFile'];

                    $targetFile = "uploaded/".$foldername."/lastFile/".basename($files['name']);

                    $targetDir = "uploaded/".$foldername."/lastFile/";

                    if (!dir_is_empty($targetDir)) {

                        //Si la carpeta NOOO esta basia

                        $ListOfFilesInDir = glob($targetDir."*");

                        foreach ($ListOfFilesInDir as $file) {

                            if(is_file($file)) unlink($file);

                        }


                    }

                    move_uploaded_file($files['tmp_name'], $targetFile);

                    $submitData = $ResModel->putModObservation($Post, $targetFile, $idObservacion);

                    $msg = array("status" => 1, "msg" => "El proyecto se a subido con exito", "path" => $targetFile);

                    header("Location: ../index.php?controller=RisingObservations");

                    exit(json_encode($msg));



                } else {

                    $msg = array("status" => 0, "msg" => "Es solo para PDF's");

                    exit(json_encode($msg));


                }


            } else {

                $msg = array("status" => 0, "msg" => "El proyecto ya existe");

                exit(json_encode($msg));


            }

        }

    }
