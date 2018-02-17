<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title><?php echo getProjectName();?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url_base();?>public/css/app.min.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo url_base();?>"><?php echo getProjectName(); ?> | <?php echo $_SESSION['sessionType']; ?></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
           <a class="nav-link" href="<?php echo url_base();?>index.php?controller=Logout"><i class="fa fa-power-off"></i> Salir</a>
        </li>
      </ul>
    </nav>

    <main role="main" class="container">
