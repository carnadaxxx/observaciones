<?php

class Login extends Controller {

   function __construct() {

       parent::__construct();

   }

   public function index() {

       if (!isset($_SESSION['loggedin'])) {

           $indexView = new View("login.php");

       } else {

           switch ($_SESSION['sessionType']) {

               case Tesista:

                   header("Location: ../index.php?controller=Tesista");

                   exit();

                   break;

               case Docente:

                   header("Location: ../index.php?controller=Docente");

                   exit();

                   break;

           }

       }

   }

}
