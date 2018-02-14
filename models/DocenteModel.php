<?php

class DocenteModel extends Model {

    /*
    *Esta funcion genera un Array con todos los Usuarios registrados en la
    *tabla Docente
    */

    public function getDocentes() {

        $query = "SELECT * FROM docente";

        $result = $this->db->query($query);

        return $result->fetchAll();

    }

    /*
    *Esta funcion recive la id del tesista recivida desde la $_SESSION y retorna
    *todos los datos relacionados con el ususario logueado
    */

    public function getDocente(int $idDocente){

        $GDQuery = "SELECT * FROM docente WHERE iddocente ='".$idDocente."'";

        $gd = $this->db->query($GDQuery);

        return $gd->fetchAll();

    }

    /*
    *Esta funcion recive 2 parametros El Nombre de usuario y la contraseña
    *los compara en la base de datos y retorna un Array de donde va a salir
    *la informacion para armar la SESSION y las COOKIS para los Docentes
    *TODO: Tratar de encapsular esta funcion en una sola
    */

    public function checkDocenteOnDB(String $usernameD, String $passwordD) {

        $param1 = $usernameD;
        $param2 = $passwordD;

        $docenteCHK = "SELECT *
            FROM docente
            WHERE docusuario = '".$param1."' AND docpassword = '".$param2."';";

        $cddb = $this->db->query($docenteCHK);

        $rows = $cddb->fetchAll();

        return $rows;
    }

}
