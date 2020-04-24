<?php include ( "inc/connect.inc.php" ); ?>
<?php 

if (isset($_REQUEST['lecnum'])) {
    
    $lecnum =$_REQUEST['lecnum'];
}else {
    header('location: index.php');
}

            $sql="SELECT * FROM lecteurs WHERE lecnum='$lecnum'"  or die(mysql_error());
            $result = $conn->query($sql);
        
                        $get_lect_data =  $result->fetch(PDO::FETCH_ASSOC);
                        $lectnum = $get_lect_data['lecnum'];
                        $lecnom=$get_lect_data['lecnom'];
                        $lecprenom=$get_lect_data['lecprenom'];
                        $lecadresse=$get_lect_data['lecadresse'];
                        $lecville=$get_lect_data['lecville'];
                        $leccodepostal=$get_lect_data['leccodepostal'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>validation lecteur</title>
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
                <h1><strong> Validation d'un lecteur </strong></h1>
                <h5>******************************************************************************</h5>
                
                <h5>Nom          : <strong><?php echo $lecnom; ?></strong></h5>
                <h5>Prénom       : <strong><?php echo $lecprenom; ?></strong></h5>
                <h5>Adresse      : <strong><?php echo $lecadresse; ?></strong></h5>
                <h5>ville        : <strong><?php echo $lecville; ?></strong></h5>
                <h5>code postal  : <strong><?php echo $leccodepostal; ?></strong></h5>
                <h5>Numéro       : <strong><?php echo $lectnum; ?></strong></h5>
                <p>vous etes enregistré dans la base de la bibliothèque</p>
                <p>vous avez la possibilité de réserver des livres ou vous <a href="index.php">identifiant ici</a> </p>
                
            </div>
        </div>
    </div>
</body>

</html>