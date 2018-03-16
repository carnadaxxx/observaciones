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

/*
*Esta funcion es necesaria para generar las alertas.
*Se supone que esto tiene que recibir el mensaje y la severidad para generar
*Pero solo recive el error de la URL y retorna pues una cadena que se inserta
*en la View
*/

function getErrorsMessages($mensaje = null) {

    if (!empty($mensaje)) {

        switch ($mensaje) {
            case error0:
                return '<div class="alert alert-warning" role="alert">Alguno de los campos esta vacio</div>';
                break;

            case error2:
                return '<div class="alert alert-warning" role="alert">Tienes que escoger un tipo de Usuario</div>';
                break;

            case error4:
                return '<div class="alert alert-warning" role="alert">Algun dato no es correcto</div>';
                break;

            default:
                return '<div class="alert alert-warning" role="alert">Algo salio mal pero no sabria decirte que</div>';
                break;
        }

    } else {

        return null;

    }

}

/*
*Esta funcion se encarga del saludo basicamente coge la fecha del sistema y
*y la conpara por un intervalo
*/

function getSaludo() {

    $hour = getHourFormServer();

    $inicioMorning = 5;
    $endMorning = 12;
    $inicioAfternoon = 13;
    $endAfternoon = 18;
    $inicioNight = 19;
    $endNigth = 23;

    switch ($hour) {
        case $hour >= $inicioMorning && $hour <= $endMorning:
            return "Buenos Días ";
            break;

        case $hour >= $inicioAfternoon && $hour <= $endAfternoon:
            return "Buenas Tardes ";
            break;

        case $hour >= $inicioNight && $hour <= $endNigth:
            return "Buenas Noches ";
            break;

        case $hour >= 0 && $hour <= $inicioMorning:
            return "Buenas Noches ";
            break;

        default:
            return "Hola ";
            break;
    }

}

/*Esta funcion consigue la hora del servidor*/

function getHourFormServer() {
    $timezone='America/Lima';
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone($timezone));
    $hour = $date->format('H');

    return (int)$hour;

}

/*Esta funcion retorna si el directorio esta basio o no*/

function dir_is_empty($dir) {
  $handle = opendir($dir);
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      return FALSE;
    }
  }
  return TRUE;
}

/* Esta funcion consigue la fecha del servidor */

function getDateFromServer() {

    $timezone='America/Lima';
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone($timezone));
    $fecha = $date->format('y-m-d');

    return $fecha;

}
