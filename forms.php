
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Autres informations personnelles</h4>
        </div>
        <div class="d-flex flex-column text-center">
        <form method="POST">
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nom de votre Mère</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="nomMere" class="form-control" value="<?php echo $resultat['nomMere'] ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nationalite</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="Nationalite" class="form-control" value="<?php echo $resultat['Nationalite'] ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Ville</h6> 
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="Ville" class="form-control" value="<?php echo $resultat['Ville'] ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Commune :</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="Commune" class="form-control" value="<?php echo $resultat['Commune'] ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Quartier:</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="Quartier" class="form-control" value="<?php echo $resultat['Quartier'] ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Rue :</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="Rue" class="form-control" value="<?php echo $resultat['Rue'] ?>">
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" name='submit' class="btn btn-primary px-4" value="Valider">
								</div>
							</div>