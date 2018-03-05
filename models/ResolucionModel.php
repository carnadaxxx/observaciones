<?php

class ResolucionModel extends Model {

    /*
    * Esta funcione deberia retornar si existe un informe inicial para poder
    * bloquear si ya subio un archibo inicial.
    */

    public function getInitialInforme(int $idtesista) {

        $giinfo = "";

        $result = $this->db->query($giinfo);

        return $result->fetchAll();

    }


}
