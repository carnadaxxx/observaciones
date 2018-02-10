<?php

    class Model {

        public $db = null;

        public  function __construct() {

            try {

                $this->db = $this->getConnection();

            } catch (PDOException $ex) {

                die("algo salio mal con la base de datos");

            }

        }

        private function getConnection() {

            $dbServername = "localhost";
            $dbUsername = "root";
            $dbPassword = "123456";
            $dbName = "ObservacionesDB";
            $charset = "utf8";
            $opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

            $pdo = new pdo("mysql:host={$dbServername};dbname={$dbName};charset={$charset}", $dbUsername, $dbPassword, $opt);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }

}
