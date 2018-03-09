<?php

class ResolucionModel extends Model {

    /*
    * Esta funcione deberia retornar si existe un informe inicial para poder
    * bloquear si ya subio un archibo inicial.
    *
    * Esto debe retornar un arreglo basio o uno lleno si es basio entonces
    * se puede hacer algo =).
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

    /*
    * Esta Funcion sirve para conseguir el numero de resolucion, Con esto
    * Creamos la carpeta para almacenar el archivo inicial.
    */

    public function getNumberOfResolution(int $idtesista) {

        $query = "SELECT pyresolucion_nro
            FROM tesista_proyecto
	           INNER JOIN res_proyecto
		             ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
            WHERE tesista_proyecto.id_tesista = ".$idtesista.";";

        $result = $this->db->query($query);

        return $result->fetchAll();

    }

    /* Esta funcion recive la direccion donde de almaceno el archivo en una
    *  cadena y lo almacena en la base de datos. Tambien recive el id para
    *  almacenarlo
    */

    public function putResolucionFile(int $idtesista, string $fileDir) {

        $prf = $this->db->prepare("UPDATE res_proyecto r JOIN tesista_proyecto t ON r.idproyecto = t.id_proyecto SET
            r.pyproyecto_archivo = '".$fileDir."'
            WHERE t.id_tesista = ".$idtesista.";");

        return $prf->execute();

    }


}
