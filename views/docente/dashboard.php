<?php session_start() ?>

<h1><?php echo $_SESSION['sessionType'] ?></h1>

<div class="card">
  <img class="card-img-top" data-src="holder.js/100%x180/?text=Image cap" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <?php

        print_r($data);

   ?>
  <div class="card-block">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
