<?php
/*
* Esto genera las rutas completas para despues desarrollar las URLs amigables
*/
function url_base() {

    return $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"]."/";

}

/*
*Esto genera el nombre del Proyecto
*/
function getProjectName() {

    require("Config.php");

    return $project_name;

}

function array_get_by_index($index, $array) {

    $i=0;
    foreach ($array as $value) {
        if($i==$index) {
            return [$i][$value];
        }
        $i++;
    }
    // may be $index exceedes size of $array. In this case NULL is returned.
    return NULL;
}
