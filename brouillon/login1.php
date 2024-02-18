<?php
 session_start();
require('db_conn.php');
if(isset($_POST['seConnecter1']))
{
			
	$numeroidentification=$_SESSION['numeroidentification'] = $_POST['numeroidentification'];
	$req=$conn->prepare("SELECT COUNT(id) FROM baseofficielle WHERE numeroidentification ='$numeroidentification' ");
	$req->execute();
	$count=$req->fetchColumn();

	if($count==1)
    {
    header("location:index.php");
    }

}

?>
<! DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/monstyle.css">
</head>
<body>
    <br>
<div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Se connecter :</div>
        <div class="panel-body">
            <form method="post" class="form">

                <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" name="numeroidentification" placeholder="Numero Identification"
                           class="form-control" autocomplete="off"/>
                </div>

                <button type="submit" class="btn btn-success" name="seConnecter1" >
                    <span class="glyphicon glyphicon-log-in"></span>
                    Se connecter
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</HTML>
