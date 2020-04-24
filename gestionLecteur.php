<?php include ( "inc/connect.inc.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$sql="SELECT * FROM lecteurs WHERE lecnum='$user'";
	$result=$conn->query($sql);
		$get_user_data = $result->fetch(PDO::FETCH_ASSOC);
			$lecnum = $get_user_data['lecnum'];
			/*$uemail_db = $get_user_email['email'];
			$ulast_db=$get_user_email['lastName'];

			$umob_db = $get_user_email['mobile'];
			$uadd_db = $get_user_email['address'];*/
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>gestion lecteur</title>
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

<body style="background-color: #66666666;"><?php  
	echo '<a  href="logout.php" >LOG OUT</a>';

	?>
	<div class="limiter">
		<div class="container-login100">
    <div class="login100-form2" >
    	<h1><strong> Gestion de lecteur</strong></h1>
				<?php echo " Le lecteur n° ".$lecnum." est reconnu"; ?>
		<h5><strong>Voici la liste des ouvrages disponibles a la reservation</strong> </h5>
        <div >
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Code Livre</th>
                        <th>Nom d'auteur</th>
                        <th>Prenom d'auteur</th>
                        <th>Titre de Livre</th>
                        <th>Categorie de Livre</th>
                        <th>Livre ISBN</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php include ( "inc/connect.inc.php");
						$query = "SELECT * FROM emprunts WHERE empnumlect=$lecnum";
									$run = $conn->query($query);
									$total = 0;
									
										$query = "SELECT * FROM livres ";
									$run = $conn->query($query);
									$total = 0;
									while ($row=$run->fetch(PDO::FETCH_ASSOC)) {
										$livcode = $row['livcode'];
										$livnomaut = $row['livnomaut'];
										$livprenomaut = $row['livprenomaut'];
										$livtitre = $row['livtitre'];
										$livcategorie = $row['livcategorie'];
										$livISBN = $row['livISBN'];
										
									 ?>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livcode; ?></strong>
                        </td>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livnomaut; ?></strong>
                        </td>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livprenomaut; ?></strong>
                        </td>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livtitre; ?></strong>
                        </td>
                        <td class="price" style="margin-right: -50px;">
                            <span><strong>
                                    <?php echo $livcategorie; ?></strong></span>
                        </td>
                        <td class="price" style="margin-right: -50px;">
                            <span><strong>
                                    <?php echo $livISBN; ?></strong></span>
                        </td>
                        <td class="price" style="margin-right: -50px;">
                            <?php 
                            echo '<span ><strong><a href="reserverLivre.php?livcode='.$livcode.'">reserver</strong></span>';
                             ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <h5><strong>Voici la liste de vos reservation</strong> </h5>
        <div >
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Code Livre</th>
                        <th>Nom d'auteur</th>
                        <th>Prenom d'auteur</th>
                        <th>Titre de Livre</th>
                        <th>Categorie de Livre</th>
                        <th>Livre ISBN</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php include ( "inc/connect.inc.php");
									$query = "SELECT * FROM emprunts WHERE empnumlect=$lecnum";
									$run = $conn->query($query);
									$total = 0;
									while ($row=$run->fetch(PDO::FETCH_ASSOC)) {
										$codelivre=$row['empcodelivre'];
										$query1 = "SELECT * FROM livres WHERE livcode='$codelivre'";
										$run1 = $conn->query($query1);
										$row1=$run1->fetch(PDO::FETCH_ASSOC);
										$livcode = $row1['livcode'];
										$livnomaut = $row1['livnomaut'];
										$livprenomaut = $row1['livprenomaut'];
										$livtitre = $row1['livtitre'];
										$livcategorie = $row1['livcategorie'];
										$livISBN = $row1['livISBN'];
										
										
									 ?>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livcode; ?></strong>
                        </td>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livnomaut; ?></strong>
                        </td>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livprenomaut; ?></strong>
                        </td>
                        <td class="cart_product_desc" style="margin-right: -10px;">
                            <strong>
                                <?php echo $livtitre; ?></strong>
                        </td>
                        <td class="price" style="margin-right: -50px;">
                            <span><strong>
                                    <?php echo $livcategorie; ?></strong></span>
                        </td>
                        <td class="price" style="margin-right: -50px;">
                            <span><strong>
                                    <?php echo $livISBN; ?></strong></span>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
   
    </div>
    </div>
    
</body>

</html>