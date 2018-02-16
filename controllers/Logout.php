<?php
session_start();
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: /');

class Logout extends Controllers {

   function __construct() {

       parent::__construct();

   }

   public function index() {


   }

}
