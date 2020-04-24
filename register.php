<?php include ( "inc/connect.inc.php" ); ?>
<?php
ob_start();
session_start();
/*if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}*/

$lecnum = "";
$leclname = "";
$lecfname = "";
$lecadresse = "";
$lecville= "";
$leccodep = "";
$lecpass = "";


if (isset($_POST['register'])) {
//declere veriable
$lec_num = $_POST['num'];
$lec_lname = $_POST['nom'];
$lec_fname = $_POST['prenom'];
$lec_adresse = $_POST['adresse'];
$lec_ville = $_POST['ville'];
$lec_codep = $_POST['codep'];
$lec_pass = $_POST['pass'];


		// Check if lecteur code already exists
		
		$sql="SELECT lecnum FROM `lecteurs ` WHERE lecnum='$lec_num'";
		$result = $conn->query($sql);

		$num_check = $result->fetch(PDO::FETCH_ASSOC);
		if (strlen($_POST['nom']) >2 && strlen($_POST['nom']) <20 ) {
			if (strlen($_POST['prenom']) >2 && strlen($_POST['prenom']) <20 ) {
				if ($num_check == 0) {
					if (strlen($_POST['pass']) >2 ) {
						$d = date("Y-m-d"); //Year - Month - Day*/
						
						
						$sql="INSERT INTO lecteurs (lecnum,lecnom,lecprenom,lecadresse,lecville,leccodepostal,lecmotdepasse) VALUES ('$_POST[num]','$_POST[nom]','$_POST[prenom]','$_POST[adresse]','$_POST[ville]','$_POST[codep]','$_POST[pass]')";
								$result = $conn->query($sql);
									if($result){
            				header('location: valideLecteur.php?lecnum='.$lec_num.'');
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
			throw new Exception('first name must be 2-20 characters!');
		}
		}else {
			throw new Exception('last name must be 2-20 characters!');
		}

	}
	
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Enregistrement d'un lecteur</title>
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
							Enregistrement dun lecteur
					</span>
					
					
					<span class="login100">
					Code
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="num" value="'.$lecnum.'">
					</div>

					<span class="login100">
					Nom
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="nom" value="'.$leclname.'">
					</div>

					<span class="login100">
					Prenom
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="prenom" value="'.$lecfname.'">
					</div>

					<span class="login100">
					mot de passe
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="pass" value="'.$lecpass.'">
					</div>

					<span class="login100">
					Adresse
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="adresse" value="'.$lecadresse.'">
					</div>

					<span class="login100">
					Code Postal
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="codep" value="'.$leccodep.'">
					</div>

					<span class="login100">
					Ville
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="ville" value="'.$lecville.'">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<a href="index.php">Login</a> 
						</button>
						<input name="register" class="login100-form-btn" type="submit" value="register">

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