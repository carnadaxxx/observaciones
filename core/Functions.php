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

function getSaludo() {

    //TODO: determinar si la funcionalidad del saludo va en el lado del servidor o del lado del cliente

    $saludo = "Buenos Dias";

    return $saludo;

}

function getFechaFinalDeEntrega() {


}
