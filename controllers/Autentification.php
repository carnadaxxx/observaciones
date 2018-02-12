<?php

class Autentification extends Controller {

   function __construct() {

       parent::__construct();

   }

   public function index() {

       if (isset($_POST['submit'])) {

           $userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);

           $userPass = filter_var($_POST['userPass'], FILTER_SANITIZE_STRING);

           $userType = filter_var($_POST['userType'] ,FILTER_SANITIZE_NUMBER_INT);


           if(empty($userName)|| empty($userPass)) {

               header("Location: ../index.php?login=error0");

               exit();

           } else {

               if ($userType == 0) {

                   header("Location: ../index.php?login=error2");

                   exit();

               } else {

                   if ($userType == 1) {

                       $ModelT = new LoadModel("TesistaModel");
                       $TesistaModel = new TesistaModel();
                       $Tesista = $TesistaModel->checkTesistaOnDB($userName, $userPass);

                       if ($Tesista == 1) {

                           header("Location: ../index.php?controller=Tesista");

                           exit();

                       } else {

                           header("Location: ../index.php?login=error4");

                           exit();
                       }


                   }

                   elseif ($userType == 2) {

                       $ModelD = new LoadModel("DocenteModel");
                       $DocenteModel = new DocenteModel();
                       $Docente = $DocenteModel->checkDocenteOnDB($userName, $userPass);

                   }

                   if ($Docente == 1) {

                       header("Location: ../index.php?controller=Docente");

                       exit();



                   } else {

                       header("Location: ../index.php?login=error5");

                       exit();
                   }

               }

            }

       } else {

           header("Location: ../index.php?login=error1");

           exit();

       }

       //$AuthView = new View("test.php");

   }


}
