<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
    $sql="SELECT * FROM lecteurs WHERE lecnum='$user'";
    $result= $conn->query($sql);

        $get_user_data =$result->fetch(PDO::FETCH_ASSOC);
         $lecnum = $get_user_data['lecnum'];
}
if (isset($_REQUEST['livcode'])) {
	
	$livcode =$_REQUEST['livcode'];
}else {
	header('location: index.php');
}

			$sql="SELECT * FROM livres WHERE livcode='$livcode'"  or die(mysql_error());
			$result = $conn->query($sql);
		
					if($result) {
						$row =  $result->fetch(PDO::FETCH_ASSOC);
						$livcode = $row['livcode'];
						$livnomaut = $row['livnomaut'];
						$livprenomaut = $row['livprenomaut'];
						$livtitre = $row['livtitre'];
						$livcategorie = $row['livcategorie'];
						$livISBN = $row['livISBN'];
					}
if (isset($_POST['confirmer'])) {
    if (!isset($_SESSION['user_login'])) {
        header('location: ../index.php');
    }
    else{

    	
    $sql="SELECT * FROM emprunts WHERE empcodelivre ='$livcode' AND empnumlect='$user'" or die(mysql_error());
    $result = $conn->query($sql);

    if ($result->rowCount()) {
    			echo "vous avez déja emprunté ce livre , choisissez un autre livre";
    			echo '<center><a href="gestionLecteur.php">Choisir un autre livre</a> </center> ';
    }else{
    	$code=substr( rand() * 900000 + 100000, 0, 8 );
    	$empdate=date("Y-m-d");
    	$empdater=date('Y-m-d', strtotime($empdate. ' + 7 days'));
        $sql="INSERT INTO emprunts (empnum,empdate,empdateret,empcodelivre,empnumlect) VALUES ('$code','$empdate', '$empdater','$livcode','$lecnum')";
         $result = $conn->query($sql);
        if($result){
            header('location: confirmationReservation.php?livcode='.$livcode.'');
        }else{ 
            header('location: index.php');
        }
    }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>reservation livre</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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

<body style="background-color: #66666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-form2">
                <h1><strong> Reserver Un Livre</strong></h1>
                <h5>Vous desirez reserver le livre suivant :</h5>
                <div>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Code Livre</th>
                                <td class="cart_product_desc" style="margin-right: -10px;">
                                    <strong>
                                        <?php echo $livcode; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Nom d'auteur</th>
                                <td class="cart_product_desc" style="margin-right: -10px;">
                                    <strong>
                                        <?php echo $livnomaut; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Prenom d'auteur</th>
                                <td class="cart_product_desc" style="margin-right: -10px;">
                                    <strong>
                                        <?php echo $livprenomaut; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Titre de Livre</th>
                                <td class="cart_product_desc" style="margin-right: -10px;">
                                    <strong>
                                        <?php echo $livtitre; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Categorie de Livre</th>
                                <td class="price" style="margin-right: -50px;">
                                    <span><strong>
                                            <?php echo $livcategorie; ?></strong></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Livre ISBN</th>
                                <td class="price" style="margin-right: -50px;">
                                    <span><strong>
                                            <?php echo $livISBN; ?></strong></span>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                    <form id="" method="post" action="">
                        <button type="submit" name="confirmer" value="confirmer" class="btn amado-btn">confirmer</button>
                    </form><br />
                </div>
            </div>
        </div>
    </div>
</body>

</html>