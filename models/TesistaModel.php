<?php

class TesistaModel extends Model {

    /*
    *Esta funcion genera un Array con todos los Usuarios registrados en la
    *tabla tesista
    */

    public function getTesistas() {

        $query = "SELECT * FROM tesista;";

        $result = $this->db->query($query);

        return $result->fetchAll();

    }

    /*
    *Esta funcion recive la id del tesista recivida desde la $_SESSION y retorna
    *todos los datos relacionados con el ususario logueado
    */

    public function getTesista(int $idtesista) {

        $GTquery = "SELECT * FROM tesista WHERE idtesista = '".$idtesista."'";

        $gt = $this->db->query($GTquery);

        return $gt->fetchAll();

    }

    /*
    *Esta funcion recive 2 parametros El Nombre de usuario y la contraseña
    *los compara en la base de datos y retorna un Array de donde va a salir
    *la informacion para armar la SESSION y las COOKIS para los Tesistas
    *TODO: Tratar de encapsular esta funcion en una sola
    */

    public function checkTesistaOnDB(String $usernameT, String $passwordT) {

        $param1 = $usernameT;
        $param2 = $passwordT;

        $tesistaCHK = "SELECT *
            FROM tesista
            WHERE tesusuario = '".$param1."' AND tespassword = '".$param2."';";

        $ctdb = $this->db->query($tesistaCHK);

        $rows = $ctdb->fetchAll();

        return $rows;

    }

    /* Esta fucnion recibe el id del tesista y retorna un array que contiene
    *  El titulo de la tesis, el numero de la resolucion y la fecha
    *  TODO: traer el co-tesista para mostrar su nombre en la plantilla
    */

    public function getTesisInfo(int $idtesista) {

        $paramm = $idtesista;

        $infotesis = "SELECT pytitulo_actual, pyresolucion_nro, pyestado ,pyresolucion_fecha
            FROM tesista_proyecto
	           INNER JOIN res_proyecto
		            ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
            WHERE tesista_proyecto.id_tesista = ".$paramm.";";

        $inft = $this->db->query($infotesis);

        return $inft->fetchAll();
    }



}
