<?php
/*
* Esto genera las rutas completas para despues desarrollar las URLs amigables
*/
function url_base() {

    return $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"]."/";

}


function getProjectName() {

    require("Config.php");

    return $project_name;

}
