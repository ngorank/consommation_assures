<?php
$p=$_GET['p']; 
require('db_conn.php');	
$sql=$conn->query("SELECT * FROM baseofficielle WHERE matricule=$p");

$sql=$conn->query("SELECT * FROM baseofficielle WHERE matricule=$p ");	
$note0 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#ccc; color:red; width:100%'><b>Votre demande est en cours de traitement</b></p>";
$note1 ="<p class='text-muted font-size-sm btn btn-info' style='border-radius:8px; color:red; width:100%'><b>Votre carte est en confection, veuillez patienter</b></p>";
$note2 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#00FF00; color:black; width:100%'><b>Votre demande a été traitée avec succès</b></p>";
$note3 ="<p class='text-muted font-size-sm' style='border-radius:8px;background-color:#FFD700; width:110%'><b>Vous aviez retiré votre carte</b></p>";

$info0 ="<p style='color:red'> Cette fiche permet de vérifier s'il n'y a pas d'erreurs dans vos</p>";
$info1 ="<p style='color:green'> Merci de patienter</p>";
$info2 ="<p style='color:green'> Veuillez remplir ce formulaire avant de vous rendre BURIDA</p>";


////

$sql=$conn->query("SELECT * FROM baseofficielle WHERE matricule=$p");	

if(isset($_POST['submit'])) {
    $nomMere = strtoupper($_POST['nomMere']);
    $Nationalite = strtoupper($_POST['Nationalite']);
    $Ville = strtoupper($_POST['Ville']);
    $Commune = strtoupper($_POST['Commune']);
    $Quartier = strtoupper($_POST['Quartier']);
    $Rue = strtoupper($_POST['Rue']);

    $data = [
      'nomMere' => $nomMere,
      'Nationalite' => $Nationalite,
      'Ville' => $Ville,
      'Commune' => $Commune,
      'Quartier' => $Quartier,
      'Rue' => $Rue,
      'matricule' => $p, // view.php?p=10840
  ];
    $sql = "UPDATE baseofficielle SET nomMere=:nomMere, Nationalite=:Nationalite, Ville=:Ville , Commune=:Commune, Quartier=:Quartier, Rue=:Rue  WHERE matricule=:matricule";
    $conn->prepare($sql)->execute($data);
    header('location:view.php?p='.$p);

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
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Accueil</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Utilisateur</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
          </nav>
          <!-- /Breadcrumb-->
  <?php while($resultat=$sql->fetch()){ ?>
   <!--Si EtatDossier=0 --->
          <?php  if($resultat['EtatDossier'] ==0){ ?>
                <?php include('etat0.php') ?>
              </div>
          </div>
          <!--Si EtatDossier=1 --->
          <?php } elseif($resultat['EtatDossier'] ==1){ ?>
            <?php include('etat1.php') ?>
          </div>
          </div>
          <!--Si EtatDossier=2 --->
          <?php } elseif($resultat['EtatDossier'] ==2){ ?>
            <?php include('etat2.php') ?>
          </div>
          </div>
          <?php include('forms.php') ?>
          <?php } ?>
          <?php } ?>

  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <!-- Popper JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
  <!-- Bootstrap JS -->
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
</body>
</html>