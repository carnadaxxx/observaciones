<?php

    class ObservacionesModel extends Model {

        /*
        * Esta funcion retorna una arreglo con la lista de observaviones
        */

        public function getLisOfObservations(int $idProyecto) {

            $query = "SELECT * FROM observacion WHERE id_proyecto=".$idProyecto.";";

            $result = $this->db->query($query);

            return $result->fetchAll();

        }


    }
