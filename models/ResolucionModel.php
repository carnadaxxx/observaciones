<?php

class ResolucionModel extends Model {

    /*
    * Esta funcione deberia retornar si existe un informe inicial para poder
    * bloquear si ya subio un archibo inicial.
    */

    public function getInitialInforme(int $idtesista) {

        $giinfo = "SELECT pyproyecto_archivo
            FROM tesista_proyecto
	           INNER JOIN res_proyecto
		             ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
             WHERE tesista_proyecto.id_tesista = ".$idtesista.";";

        $result = $this->db->query($giinfo);

        return $result->fetchAll();

    }


}
