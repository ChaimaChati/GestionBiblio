<?php include ( "inc/connect.inc.php" ); ?>
<?php 

if (isset($_REQUEST['livcode'])) {
    
    $livcode =$_REQUEST['livcode'];
}else {
    header('location: index.php');
}

            $sql="SELECT * FROM livres WHERE livcode='$livcode'"  or die(mysql_error());
            $result = $conn->query($sql);
         
                        $get_liv_data =  $result->fetch(PDO::FETCH_ASSOC);
                        $livcode = $get_liv_data['livcode'];
                        $livnomaut=$get_liv_data['livnomaut'];
                        $livprenomaut=$get_liv_data['livprenomaut'];
                        $livtitre=$get_liv_data['livtitre'];
                        $livcategorie=$get_liv_data['livcategorie'];
                        $livISBN=$get_liv_data['livISBN'];

    

?>
<!DOCTYPE html>
<html>

<head>
    <title>validation livre</title>
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
                <h1><strong> Validation d'un livre </strong></h1>
                <h5>******************************************************************************</h5>
                
                <h5>Nom d'auteur         : <strong><?php echo $livnomaut; ?></strong></h5>
                <h5>Prénom d'auteur      : <strong><?php echo $livprenomaut; ?></strong></h5>
                <h5>titre de livre     : <strong><?php echo $livtitre; ?></strong></h5>
                <h5>catégorie de livre     : <strong><?php echo $livcategorie; ?></strong></h5>
                <h5>ISBN : <strong><?php echo $livISBN; ?></strong></h5>
                
                
                
            </div>
        </div>
    </div>
</body>

</html>