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

    }
