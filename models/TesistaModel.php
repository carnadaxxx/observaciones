<?php

class TesistaModel extends Model {

    public function getTesista() {

        $query = "SELECT * FROM tesista;";

        $result = $this->db->query($query);

        return $result->fetchAll();

    }

    public function checkTesistaOnDB(String $usernameT, String $passwordT) {

        $param1 = $usernameT;
        $param2 = $passwordT;

        $tesistaCHK = "SELECT *
            FROM tesista
            WHERE tesusuario = '".$param1."' AND tespassword = '".$param2."';";

        $ctdb = $this->db->query($tesistaCHK);

        $rows = $ctdb->rowCount();

        return $rows;

    }


}
