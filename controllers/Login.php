<?php

class Login extends Controller{

   function __construct() {

       parent::__construct();

   }

   public function index() {

       $loginView = new Layout("login.php", "", "index.js");

   }

}
