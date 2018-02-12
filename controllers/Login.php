<?php

class Login extends Controller {

   function __construct() {

       parent::__construct();

   }

   public function index() {

       $indexView = new Layout("login.php", "", "index.js");

   }


}
