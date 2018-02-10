<?php

class DocenteModel extends Model {

    public function getDocente() {

        $result = $this->db->query("SELECT * FROM docente");

        return $result->fetchAll();


    }

}
