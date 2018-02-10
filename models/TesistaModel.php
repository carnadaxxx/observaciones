<?php

class TesistaModel extends Model {

    public function getTesista() {

        $query = "SELECT idtesista FROM tesista;";

        $result = $this->db->query($query);

        return $result->fetchAll();

    }

}
