<?php
session_start();

/*
*Esta es el controlador que maneja el proceso de Autentificacion
*TODO: Es necesario encriptar las contraseñas para los docentes y tesistas
*/

class Autentification extends Controller {

   function __construct() {

       parent::__construct();

   }

   public function index() {

       if (isset($_POST['submit'])) {

           $userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);

           $userPass = filter_var($_POST['userPass'], FILTER_SANITIZE_STRING);

           $userType = filter_var($_POST['userType'] ,FILTER_SANITIZE_NUMBER_INT);

           /*
           *Esta parte se encarga de filtrar del lado del servidor si los
           *parametros enviados por el formulario no estan vacios
           *Solo compara si el $userName y $userPass estan vacios ya que el
           *parametro $userType envia solo 3 valores 0,1,2
           */

           if(empty($userName)|| empty($userPass)) {

               header("Location: ../index.php?login=error0");

               exit();

           } else {

               /*
               *Esta parte recive el parametro $userType y lo usa como
               *condicional para retornar un error en caso de que se envie
               *la informacion del formulario con el $userType == 0
               */

               if ($userType == 0) {

                   header("Location: ../index.php?login=error2");

                   exit();

               } else {

                   /*
                   *Esta parte es la que genera las Sessiones segun el tipo de
                   *usuario.
                   *TODO: Esto tambien puede ser encapsulado la creacion de la
                   *session
                   */

                   if ($userType == 1) {

                       $ModelT = new LoadModel("TesistaModel");
                       $TesistaModel = new TesistaModel();
                       $TesistaArray = $TesistaModel->checkTesistaOnDB($userName, $userPass);

                       /*Si el array regresa vacio */
                       if (empty($TesistaArray)) {

                           header("Location: ../index.php?login=error4");

                           echo getErrorsMessages('Hola mundo', 'alert-danger');

                           exit();

                       } else {

                           $tesistaId = $TesistaArray[0]['idtesista'];
                           $tesistaName = $TesistaArray[0]['tesnombre'];
                           $tesistaLastName = $TesistaArray[0]['tesapellido'];

                           $_SESSION['loggedin'] = true;
                           $_SESSION['sessionType'] = Tesista;
                           $_SESSION['sessionIdTesista'] = $tesistaId;
                           $_SESSION['sessionNameTesista'] = $tesistaName;
                           $_SESSION['sessionLastNameTesista'] = $tesistaLastName;

                           header("Location: ../index.php?controller=Tesista");

                           exit();

                       }

                   }

                   elseif ($userType == 2) {

                       $ModelD = new LoadModel("DocenteModel");
                       $DocenteModel = new DocenteModel();
                       $DocenteArray = $DocenteModel->checkDocenteOnDB($userName, $userPass);

                       if (empty($DocenteArray)) {

                           header("Location: ../index.php?login=error5");

                           exit();

                       } else {

                           $idDocente = $DocenteArray[0]['iddocente'];

                           $_SESSION['loggedin'] = true;
                           $_SESSION['sessionType'] = Docente;
                           $_SESSION['sessionIdDocente'] =  $idDocente;

                           header("Location: ../index.php?controller=Docente");

                           exit();

                       }

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
