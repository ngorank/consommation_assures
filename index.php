<?php	
 session_start(); 
 
  $user_id_assure_principal=$_SESSION["numero_ayant_droit"];
 if(empty($user_id_assure_principal)) {
	header("location:login.php"); 
 }
 require('db_conn.php');
$sql=$conn->query("SELECT * FROM tb_consommation WHERE user_id_assure_principal='$user_id_assure_principal' ");		





if(isset($_POST['submit'])) {
    $nomMere = strtoupper($_POST['nomMere']);
    $Nationalite = strtoupper($_POST['Nationalite']);
    $Ville = strtoupper($_POST['Ville']);
    $Commune = strtoupper($_POST['Commune']);
    $Quartier = strtoupper($_POST['Quartier']);
    $Rue = strtoupper($_POST['Rue']);

    $req = "UPDATE baseofficielle SET nomMere='$nomMere', Nationalite='$Nationalite', Ville='$Ville',
    Commune ='$Commune', Quartier='$Quartier',Rue='$Rue' WHERE `numeroidentification`='$numeroidentification' ";
    $result = mysqli_query($connex, $req);
    if ($result) {
        header('location:index.php');
    } else {
        echo "Echoué: " . mysqli_error($connex);
    }
}


?>






<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURIDA | CARTES</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>

    <style>
        body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
    </style>
</head>
<body>
    


<div class="container">
    <div class="main-body">

       
          <!-- Breadcrumb -->
          <!--nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav-->
          <!-- /Breadcrumb -->
<?php

//echo $numeroidentification;
    while($resultat=$sql->fetch()){ ?>

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">



                      <?php 
                      $note0 ="<p style='color:red'><b> Cette fiche permet de vérifier s'il n'y a pas d'erreurs dans vos informations </b></p>";
                      $note1 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#00FF00; color:black; width:100%'><b>Merci de remplir le formuaire avant le retrait de votre carte</b></p>";
                      $note2 ="<p></p>";
                      
                      if($resultat['user_id_assure_principal'] ==0){
                        echo $note0;
                      }
                      elseif($resultat['user_id_assure_principal'] ==1){
                        echo $note1;
                      }
                      else{
                        echo $note2;
                      }
                      ?>


                    <img src="http://badogec.com/badogec/pages/uploads/<?php echo $resultat['matricule']; ?>.jpg" alt="Admin" class="rounded-circle" width="150">
                    <!--img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"-->
                    <div class="mt-3">
                      <h4><?php echo $resultat['RaisonSociale']; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $resultat['pseudonyme']; ?></p>

                      <?php
                      $note0 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#ccc; color:red; width:100%'><b>Votre demande est en cours de traitement</b></p>";
                      $note1 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#00FF00; color:black; width:100%'><b>Votre demande a été traitée avec succès</b></p>";
                      $note2 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#FFD700; width:110%'><b>Vous aviez retiré votre carte</b></p>";
                      
                      if($resultat['user_id_assure_principal'] ==0){
                        echo $note0;
                      }
                      elseif($resultat['user_id_assure_principal'] ==1){
                        echo $note1;
                      }
                      else{
                        echo $note2;
                      }
                      ?>

                      <!--button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Email</h6>
                    <span class="text-secondary"><?php echo $resultat['EmailAddress'] ?></span>
                  </li>

                  <?php if($resultat['EtatDossier'] ==0){?>
                      <hr>

                      
                  <?php } elseif($resultat['EtatDossier'] ==1 OR empty($resultat['EtatDossier'])){  ?>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nom de la mère</h6>
                    <span class="text-secondary"><?php echo $resultat['nomMere'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nationalité</h6>
                    <span class="text-secondary"><?php echo $resultat['Nationalite'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Commune</h6>
                    <span class="text-secondary"><?php echo $resultat['Commune'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Ville</h6>
                    <span class="text-secondary"><?php echo $resultat['Ville'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Quartier</h6>
                    <span class="text-secondary"><?php echo $resultat['Quartier'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Rue</h6>
                    <span class="text-secondary"><?php echo $resultat['Rue'] ?></span>
                  </li>
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"></h6>
                    <span class="text-secondary">
                    <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
                      Remplir le formulaire
                    </button>  
                      
                  </span>
                  </li>

                  <?php } ?>  
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom & Prénoms</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $resultat['RaisonSociale']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pseudonyme</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $resultat['RaisonSociale']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Matricule</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                                           
                    <?php echo $resultat['matricule']; ?>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Qualite(s)</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                                           
                    <?php echo $resultat['qualite']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date Adhesion </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                                           
                    <?php echo $resultat['DateAdhesion']; ?>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date et lieu de Naissance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                                           
                    <b><?php echo $resultat['City']; ?></b> le  <b><?php echo $resultat['DateOfBirth']; ?></b>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mes ontacts </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                                           
                    <?php echo $resultat['MobilePhone'].' / '; ?>
                    <?php echo $resultat['HomePhone'].' / '; ?>
                    <?php echo $resultat['OfficePhone']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type de Piece</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">    
                      <?php                                       
                      if($resultat['IDType']==1){
                     echo $piece='PASSEPORT';
                    }elseif($resultat['IDType']==2){
                    echo  $piece='CNI';
                  }elseif($resultat['IDType']==3){
                    echo  $piece='ATTESTATION';
                    }
                    else{ echo 'AUTRE';} 
                    ?> 
                    (<?php echo $resultat['IDNumber']?>) 
                    </div>
                  </div>
                    <?php if($resultat['EtatDossier'] ==0){?>
                      <hr>
                  <div class="row">
                    <div class="col-sm-12" style='text-align:center'>
                   <img src="../badogec/pages/static/temp/<?php echo $resultat['imageqrcode']; ?>" width="100px">
                    </div>
                  </div>
                      <?php } elseif($resultat['EtatDossier'] ==1){  ?>
                     
                <hr>

              <?php }else{ ?>
              <!----vide------->                 
             <?php  } ?>

                  <hr>
                  <div class="row">
                    <!--div class="col-sm-12">
                      <a class="btn btn-info " target="blank" href="edit.php">Edit</a>
                    </div-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

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
    </div>
  </div>
</div>
</div>
</div>
<?php } ?>

<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <!-- Popper JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
  <!-- Bootstrap JS -->
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
   <!-- Custom Script -->     
</body>
</html>