<?php
/*
*Esta clase  genera el la vista, todavia existe la clase views pero esa es
*para cosas que no requieran un header o $footer
*
*Esta clase recive 3 parametros
*$view el nombre de la vista
*$data los datos recividos
*$js si la vista va incluir un archivo js
*
*/

class Layout {

    function __construct($view, $data = null, $js = null) {

        require("Config.php");

        if (file_exists("./views/$view")) {

            if (file_exists("./views/layout/$header")) {
                require("./views/layout/".$header);
            }  else {
                die("no header");
            }

            require("./views/$view");

            if (file_exists("./views/layout/$footer")) {
                require("./views/layout/".$footer);

                if (isset($js)) {

                    print("<script src=".url_base()."public/js/".$js."></script>");

                }

                print("</body></html>");

            } else {

                die("no footer");

            }

        } else {

            die("Vista no encontrada");

        }

    }

}
