<?php

    class ObservacionesModel extends Model {

        /*
        * Esta funcion retorna una arreglo con la lista de observaviones asignadas
        * a un proyecto.
        * Esta funcion recive la ide del proyecto conseguida atraves se un SESSION param
        */

        public function getLisOfObservations(int $idProyecto) {

            $query = "SELECT * FROM observacion WHERE id_proyecto=".$idProyecto.";";

            $result = $this->db->query($query);

            return $result->fetchAll();

        }

        /*
        * Esta es la funcion que trae la observacion por ID
        */

        public function getRespuestaObservacion(int $idObservacion) {

            $query = "SELECT Obsobservacion FROM observacion WHERE idobservacion = ".$idObservacion.";";

            $result = $this->db->query($query);

            $rslt = $result->fetchAll();

            return $rslt[0]['Obsobservacion'];

        }

        /*
        * Esta funcion trae el id proyecto con el idobservacion
        */

        public function getIDProyectoByIdObservacion(int $idObservacion) {

            $query = "SELECT  id_proyecto FROM observacion WHERE idobservacion = ".$idObservacion.";";

            $result = $this->db->query($query);

            $rslt = $result->fetchAll();

            return $rslt[0]['id_proyecto'];

        }

        /*
        * Esta es la funcion que trae el numero de la resuolucion por ide observacion
        */

        public function getNroResolucionByidObservacion(int $idObservacion) {

            $query = "SELECT pyresolucion_nro FROM observacion
	           INNER JOIN res_proyecto ON observacion.id_proyecto = res_proyecto.idproyecto
               WHERE idobservacion = ".$idObservacion.";";

            $result = $this->db->query($query);

            $rslt = $result->fetchAll();

            return $rslt[0]['pyresolucion_nro'];

        }

        /*
        * Esta funcion modifica el estado de una observacion recive la idObservacion y el estado
        * del formulario
        */

        public function editraObservacionEstadoByIdObservacion(int $idObservacion, int $estado) {

            $query = $this->db->prepare("UPDATE ObservacionesDB.observacion
                SET Obsestado='".$estado."'
                WHERE idobservacion=".$idObservacion.";");

            return $query->execute();

        }

        /*
        *  Esta funcion es la que crea la observacion
        *  aqui entran 3 parametros el texto la id del docente y la id del proyecto
        */

        public function createNewObservacion(string $text, int $iddocente, int $idproyecto) {

            $date = getDateFromServer();

            $query = $this->db->prepare("INSERT INTO ObservacionesDB.observacion (Obsfecha_obs,Obsactividad,Obsobservacion,Obslevantamiento,Obsestado,id_docente,id_proyecto)
                VALUES ('".$date."','1','".$text."',' ','2',".$iddocente.",".$idproyecto.")");

            return $query->execute();

        }


    }
