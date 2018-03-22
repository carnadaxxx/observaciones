<?php

class ResolucionModel extends Model {

    /*
    * Esta funcione deberia retornar si existe un informe inicial para poder
    * bloquear si ya subio un archibo inicial.
    *
    * Esto deberia retornar un true si esta lleno y false si esta basio
    */

    public function getHasProyecto(int $idtesista) {

        $giinfo = "SELECT pyproyecto_archivo
            FROM tesista_proyecto
	           INNER JOIN res_proyecto
		             ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
            WHERE tesista_proyecto.id_tesista = ".$idtesista.";";

        $result = $this->db->query($giinfo);

        $rslt = $result->fetchAll();

        if (empty($rslt[0]['pyproyecto_archivo'])) {

            //Esta basio
            return 1;

        } else {

            //NO esta basio
            return 0;

        }

    }

    /*
    * Esta funcion esta para conseguir la direccion exacta almacenada en la Base de datos
    * donde esta almacenado el poryecto.
    */

    public function getProyectoArchivo(int $idtesista) {

        $gpa = "SELECT pyproyecto_archivo FROM tesista_proyecto
	        INNER JOIN res_proyecto
		         ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
             WHERE tesista_proyecto.id_tesista = ".$idtesista.";";

        $result = $this->db->query($gpa);

        $rslt = $result->fetchAll();

        return $rslt[0]['pyproyecto_archivo'];
    }

    /*
    * Esta funcion esta para conseguir la direccion exacta almacenada en la Base de datos
    * donde esta almacenado el ultimo Informe.
    */

    public function getInformeArchivo(int $idtesista) {

        $gia = "SELECT pyinforme_archivo FROM tesista_proyecto
            INNER JOIN res_proyecto
                 ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
             WHERE tesista_proyecto.id_tesista = ".$idtesista.";";

        $result = $this->db->query($gia);

        $rslt = $result->fetchAll();

        return $rslt[0]['pyinforme_archivo'];
    }

    /*
    * Esta Funcion sirve para conseguir el numero de resolucion, Con esto
    * Creamos la carpeta para almacenar el archivo inicial.
    * Recive la Id del Tesista que conseguimos como variable de session;
    */

    public function getNumberOfResolution(int $idtesista) {

        $query = "SELECT pyresolucion_nro
            FROM tesista_proyecto
	           INNER JOIN res_proyecto
		             ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
            WHERE tesista_proyecto.id_tesista = ".$idtesista.";";

        $result = $this->db->query($query);

        $numRes = $result->fetchAll();

        return  $numRes[0]['pyresolucion_nro'];

    }

    /*
    * Lo mismode arriba pero con el id del proyecto
    */

    public function getNumberOfResoltionByIdProyect(int $idproyecto) {

        $query = "SELECT pyresolucion_nro FROM res_proyecto WHERE idproyecto=".$idproyecto.";";

        $result = $this->db->query($query);

        $rslt = $result->fetchAll();

        return $rslt[0]['pyresolucion_nro'];

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


    /*
    * Esta funcion trae la Id de proyecto en base la ID de tesista.
    * Esto no retorna un array esto ya retorna un INT
    */

    public function getProjectIDByUserID(int $idTesista) {

        $query = "SELECT id_proyecto FROM tesista_proyecto
               INNER JOIN res_proyecto
             ON res_proyecto.idproyecto = tesista_proyecto.id_proyecto
             WHERE tesista_proyecto.id_tesista = ".$idTesista.";";


        $result = $this->db->query($query);

        $rslt = $result->fetchAll();

        return $rslt[0]['id_proyecto'];

    }

    /*
    * Esta funcion modifica la observacion hay 3 cosas que hace
    * - Recive la observacion + la direccion del archivo y lo almacena en la
    *   tabla res_proyecto
    * - Cambia el estado.
    * - y Agrega la fecha automaticamente en el campo
    * Aunque deberia aver un estado intermedio 0 no levantado, 1 en proceso de revision
    * 3 aprovado.
    */
    public function putModObservation(String $levText , String $dirInfo, int $idobservacion) {

        $query = $this->db->prepare("UPDATE observacion o
        	JOIN res_proyecto r ON r.idproyecto = o.id_proyecto
        	SET o.Obsfecha_lev = '".getDateFromServer()."', o.Obslevantamiento = '".$levText."' , o.Obsestado = 1, r.pyinforme_archivo = '".$dirInfo."'
        	WHERE o.idobservacion = ".$idobservacion.";");

        return $query->execute();

    }

    /*
    * Esta funcion retorna la lista de proyectos asigandos a un docente
    * Esta funcion recibe la idDocente y retorna un array con la lista de
    * proyectos asignados a ese docente
    */

    public function getListOfProyectByDocente(int $iddocente) {

        $query = "SELECT * FROM docente
        	INNER JOIN res_asesor ON res_asesor.id_docente = docente.iddocente
        	INNER JOIN res_proyecto ON res_proyecto.idproyecto = res_asesor.id_proyecto
        WHERE iddocente = ".$iddocente." AND res_proyecto.pyestado = 1;";

        $result = $this->db->query($query);

        $rslt = $result->fetchAll();

        return $rslt;

    }

    /*
    * Esta funcion es la que trae la informacion de un proyecto en base a la
    * Idproyecto
    */

    public function getInfoOfProyectByIdProyecto(int $idproyecto) {

        $query = "SELECT * FROM res_proyecto WHERE idproyecto=".$idproyecto.";";

        $result = $this->db->query($query);

        $rslt = $result->fetchAll();

        return $rslt;


    }

}
