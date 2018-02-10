<?php

class Login extends Controller{

   function __construct() {

       parent::__construct();

   }

   public function index() {

       $loginView = new View("login.php");

   }

}
