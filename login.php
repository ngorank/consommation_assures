<?php
 session_start();
require('db_conn.php');
if(isset($_POST['seConnecter']))
{
			
	$user_id_assure_principal=$_SESSION['user_id_assure_principal'] = $_POST['user_id_assure_principal'];
	//$req=$conn->prepare("SELECT COUNT(id) FROM tb_assures WHERE numero_ayant_droit ='$numero_ayant_droit' ");

	
	$req=$conn->prepare("SELECT COUNT(user_id_assure_principal) FROM tb_assures WHERE user_id_assure_principal ='$user_id_assure_principal' ");
	$req->execute();
	$count=$req->fetchColumn();
	if($count==1)
    {
    header("location:vue.php");
    }

}

?>
<!doctype html>
<html lang="fr">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center" style="background-color:orange">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4"style="color:orange">Code de Demande de Carte</h3>
						<form action="#" method="POST" class="login-form">
		      		<div class="form-group">
		      			<input type="text" name='user_id_assure_principal' class="form-control rounded-left" placeholder="CB09-1450" required>
		      		</div>
	            <!--div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" required>
	            </div-->

	            <div class="form-group">
	            	<button type="submit" name="seConnecter"  class=" btn-warning rounded submit p-3 px-5" style="background-color:orange">Se Connecter</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

