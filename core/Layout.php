<?php
/*
*Esta clase incluye el header y el footer recive la vista y al a data
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
