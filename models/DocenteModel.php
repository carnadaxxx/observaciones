<?php

class DocenteModel extends Model {

    public function getDocente() {

        $result = $this->db->query("SELECT * FROM docente");

        return $result->fetchAll();


    }

    public function checkDocenteOnDB(String $usernameD, String $passwordD) {

        $param1 = $usernameD;
        $param2 = $passwordD;

        $docenteCHK = "SELECT *
            FROM docente
            WHERE docusuario = '".$param1."' AND docpassword = '".$param2."';";

        $cddb = $this->db->query($docenteCHK);

        $rows = $cddb->rowCount();

        return $rows;
    }


}
