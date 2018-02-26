<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title><?php echo getProjectName();?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url_base();?>public/css/app.min.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo url_base();?>"><?php echo getProjectName(); ?></a>
    </nav>

    <main role="main" class="container">
        <div class="container">
             <div class="row">
                 <div class="col-lg-6 mx-auto">

                     <?php echo getErrorsMessages($_GET['login']); ?>

                     <h1>Bienvenidos a <?php echo getProjectName();?></h1>
                     <div class="card">
                         <div class="card-header">
                            Ingresa a tu cuenta
                         </div>
                         <div class="card-body">

                             <form action="index.php?controller=Autentification" method="POST">

                                 <div class="form-group">
                                     <label for="userName">Usuario:</label>
                                     <input type="text" class="form-control" name="userName" id="userName" placeholder="Usuario">
                                     <div class="invalid-feedback">
                                          Please choose a username.
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label for="userPass">Contraseña:</label>
                                     <input type="password" class="form-control" name="userPass" id="userPass" placeholder="Password">
                                     <div class="invalid-feedback">
                                          Please choose a username.
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label for="userTipo">Tipo de Usuario:</label>
                                     <select class="form-control" id="userTipo" name="userType" required>
                                      <option value="0">-- Seleccione --</option>
                                      <option value="1">Tesista</option>
                                      <option value="2">Docente</option>
                                    </select>
                                 </div>

                                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                             </form>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </main>

     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <script type="text/javascript" src="<?php echo url_base(); ?>public/node_modules/jquery/dist/jquery.min.js" ></script>
     <script type="text/javascript" src="<?php echo url_base(); ?>public/node_modules/popper.js/dist/popper.min.js"></script>
     <script type="text/javascript" src="<?php echo url_base(); ?>public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="<?php echo url_base(); ?>public/js/index.js"></script>
</body>
