<h1><?php echo $_SESSION['sessionType'] ?></h1>


<div class="card-deck-wrapper mb0">
  <div class="card-deck">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Card title</h4>
        <p class="card-text">
            <?php
                echo "Bienvenido! " . $_SESSION['sessionType'] ." // ". $_SESSION['sessionId'];
            ?>
        </p>
      </div>
    </div>

  </div>
</div>



<div class="card-deck-wrapper">
  <div class="card-deck">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Card title</h4>
        <p class="card-text">

            <?php
                print_r($data);
            ?>

        </p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>

  </div>
</div>
