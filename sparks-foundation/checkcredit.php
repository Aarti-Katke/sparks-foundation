<?php
    //echo '<pre>'; print_r($_POST); echo '</pre>';
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "basic_banking_system1";
    
    $con=mysqli_connect($servername, $username, $password, $database);
    
    $q="SELECT * FROM Customer WHERE id=".$_POST['sender'];
    $result=mysqli_query($con, $q);
    $sender=mysqli_fetch_assoc($result);
    
    $q="SELECT * FROM Customer WHERE id=".$_POST['receiver'];
    $result=mysqli_query($con, $q);
    $receiver=mysqli_fetch_assoc($result);
    
    // echo '<pre>'; print_r($sender); echo '</pre>';
    // echo '<pre>'; print_r($receiver); echo '</pre>';
    if ($sender['amount'] > $_POST['amount']) {
    	# Deduct amount from sender
    	$final_amount_sender = $sender['amount'] - $_POST['amount'];
    	$q="UPDATE Customer SET amount = ".$final_amount_sender." WHERE id=".$_POST['sender'];
    	$result=mysqli_query($con, $q);
    
    	# Transfer amount to receiver
    	$final_amount_receiver = $receiver['amount'] + $_POST['amount'];
    	$q="UPDATE Customer SET amount = ".$final_amount_receiver." WHERE id=".$_POST['receiver'];
    	$result=mysqli_query($con, $q);

    	# Update transfers history
    	$q="INSERT INTO Transaction (sender, receiver, amount) VALUES ('".$sender['name']."', '".$receiver['name']."', ".$_POST['amount'].")";
    	$result=mysqli_query($con, $q);

    	$message="AMOUNT TRANSFERRED SUCCESSFULLY";
    } else {
    	$message="INSUFFICIENT BALANCE";
    }
?>

<html>
    <head>
        <title>Transfer</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <style>
            body{
            background-image: url("2.jpg");
            background-size: 100%;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbat-dark bg-dark">
            <a class=" navbar-brand" href="">SPARKS BANK </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="#navbarToggleExternalContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> 
                        <a class="nav-link" href="index.php">🔁HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="transaction_history.php">TRANSACTION HISTORY</a>
                    </li>
                </ul>
            </div>
        </nav>
        <center>
            <div class="view">
                <br><br>
                <h2 style=" font-size:45px;color:white;"><?php echo $message ?></h2>
            </div>
        </center>
    </body>
</html>