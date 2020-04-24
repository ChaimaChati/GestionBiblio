<?php include ( "inc/connect.inc.php" ); ?>
<?php

$code="";
$nomaut = "";
$prenomaut = "";
$titree = "";
$cat = "";
$num= "";



if (isset($_POST['enregistrer'])) {
//declere veriable
$livcode=$_POST['code'];
$nom_aut = $_POST['nom'];
$prenom_aut = $_POST['prenom'];
$titre = $_POST['titre'];
$categorie = $_POST['categorie'];
$numISBN = $_POST['numISBN'];



		
		// Check if livre code already exists
		
		$sql="SELECT livcod FROM `livres ` WHERE livcod='$livcode'";
		$result = $conn->query($sql);

		$num_check = $result->fetch(PDO::FETCH_ASSOC);
		if (strlen($_POST['code']) >2 && strlen($_POST['code']) <20 ) {
		  if (strlen($_POST['nom']) >2 && strlen($_POST['nom']) <20 ) {
			if (strlen($_POST['prenom']) >2 && strlen($_POST['prenom']) <20 ) {
			if (strlen($_POST['titre']) >2 && strlen($_POST['titre']) <20 ) {
			if (strlen($_POST['categorie']) >2 && strlen($_POST['categorie']) <20 ) {

				if ($num_check == 0) {
					if (strlen($_POST['pass']) >2 ) {
						$d = date("Y-m-d"); //Year - Month - Day*/
						
						
						$sql="INSERT INTO livres (livcode,livnomaut,livprenomaut,livtitre,livcategorie,livISBN) VALUES ('$_POST[code]','$_POST[nom]','$_POST[prenom]','$_POST[titre]','$_POST[categorie]','$_POST[numISBN]')";
								$result = $conn->query($sql);
									if($result){
            				header('location: validationLivre.php?livcode='.$livcode.'');
	       						 }else{ 
	         				   header('location: index.php');
	    						    }
						
					}else {
						throw new Exception('Make strong password!');
					}
				}else {
					throw new Exception('num already taken!');
				}
				}else {
			throw new Exception('title must be 2-20 characters!');
		}
		}else {
			throw new Exception('category must be 2-20 characters!');
		}
			}else {
			throw new Exception('first name must be 2-20 characters!');
		}
		}else {
			throw new Exception('last name must be 2-20 characters!');
		}
	}else {
			throw new Exception('code must be 2-20 characters!');
		}

	
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Enregistrement livre</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100" >
				<?php 
				echo'
				<form class="login100-form1 validate-form" action="" method="POST" >
					<span class="login100-form-title p-b-100">
							Enregistrement dun livre
					</span>
					
					
					<span class="login100">
					Code Livre
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="code" value="'.$code.'">
					</div>

					<span class="login100">
					Nom Auteur
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="nom" value="'.$nomaut.'">
					</div>

					<span class="login100">
					Prenom Auteur
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="prenom" value="'.$prenomaut.'">
					</div>

					<span class="login100">
					titre livre
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="titre" value="'.$titree.'">
					</div>

					<span class="login100">
					Catégorie de livre
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="categorie" value="'.$cat.'">
					</div>

					<span class="login100">
					ISBN
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="numISBN" value="'.$num.'">
					</div>

					

					<div class="container-login100-form-btn">
						
						<input name="enregistrer" class="login100-form-btn" type="submit" value="enregistrer">

					</div>

				</form>
					';
					?>
				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>