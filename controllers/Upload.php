<?php
    /*
    * Esta clase es la que maneja toda la logica desde el servidor
    * la subida de archivos
    */

class Upload extends Controller {

    function __construct() {

        parent::__construct();

    }

    public function index() {

        if (isset($_FILES['fileupload'])) {

            $arreglo = $_FILES['fileupload']['name'];

            $arregloT = $_FILES['fileupload']['type'];

            print_r($_FILES['fileupload']);

            print_r($arreglo."  ".$arregloT);

        } else {

            print_r("algo salio mal");

        }

    }

}
