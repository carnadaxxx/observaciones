<?php
class Controller {

    function __construct() {

        if($_GET && isset($_GET["action"])) {

            $action = $_GET["action"];

            if (method_exists($this, $action)) {

                $this->$action();

            } else {

                die("error 404.2 sitio no encontrado");

            }

        } else {

            if (method_exists($this, "index")) {

                $this->index();

            } else {

                die("error 404.1 indice no definido");

            }

        }

    }

}
