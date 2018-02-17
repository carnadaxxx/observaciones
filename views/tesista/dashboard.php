<h1>
    <?php echo getSaludo() ?>
    <small>
    <?php echo $_SESSION['sessionNameTesista'];?>
    <?php echo $_SESSION['sessionLastNameTesista'];?>
    </small>
</h1>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card mb-3" >
          <div class="card-header">Datos la Tesis</div>
          <div class="card-body">
            <h5 class="card-title">Titulo:</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <h5 class="card-title">Area:</h5>
            <p class="card-text">Some quick example text.</p>
            <h5 class="card-title">Linea de Investigacion:</h5>
            <p class="card-text">Some quick example text.</p>
            <h5 class="card-title">Co Autor:</h5>
            <p class="card-text">Some quick example text.</p>
          </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card mb-3" >
          <div class="card-header">Estado de la Tesis</div>
          <div class="card-body">
            <h5 class="card-title">Tiempo para Terminar <small>Te faltan 3 días</small></h5>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card text-center" >
          <div class="card-body">
            <h5 class="card-title">Acciones</h5>
            <button type="button" class="btn btn-primary btn-lg">Subir Informe</button>
            <button type="button" class="btn btn-primary btn-lg">Levantamiento de Observaciones</button>
          </div>
        </div>
    </div>
</div>
