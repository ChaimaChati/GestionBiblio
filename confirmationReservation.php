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
        
                        $get_livre_data =  $result->fetch(PDO::FETCH_ASSOC);
                        $livcode = $get_livre_data['livcode'];
                        
                    

    if (!isset($_SESSION['user_login'])) {
        header('location: ../index.php');
    }
    else{

        
    $sql="SELECT * FROM emprunts WHERE empcodelivre ='$livcode' AND empnumlect='$user'" or die(mysql_error());
    $result = $conn->query($sql);

    if ($result->rowCount()) {
            $row=$result->fetch(PDO::FETCH_ASSOC);
            $empnum=$row['empnum'];
            $empdate=$row['empdate'];
            $empdateret=$row['empdateret'];
            $empcodelivre=$row['empcodelivre'];
            $empnumlect=$row['empnumlect'];

    }else{
        
    }
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>confirmation reservation </title>
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
                <h1><strong> Confirmation de votre reservation </strong></h1>
                <h5>Votre réservation est confirmé sous le numéro : <strong>
                        <?php echo $empnum; ?></strong></h5>
                <h5>Date de la réservation : <strong>
                        <?php echo $empdate; ?></strong> </h5>
                <h5>Date de Retour : <strong>
                        <?php echo $empdateret; ?></strong> </h5>
                <p>vous pouvez revenir à la listedes livres disponible à la réservation en cliquant <a href="gestionLecteur.php">ici</a></p>
            </div>
        </div>
    </div>
</body>

</html>