<?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "basic_banking_system1";
    
    $con=mysqli_connect($servername, $username, $password, $database);
    
    $q="SELECT * FROM Customer;";
    $result=mysqli_query($con, $q);
    $data   = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $data[] = $row;
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
                <h2 style=" font-size:45px;color:white;">TRANSFER AMOUNT</h2>
                <form  action="checkcredit.php" method="POST">
                    <div class="">
                        <table>
                            <tr>
                                <td style="font-size:15pt;color:#fff;">
                                    <label for="sender" align="left">SENDER'S NAME: </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<select name="sender" style="font-size: 12pt; height: 28px; width:290px;">
                                    <?php 
                                        foreach ($data as $row) {
                                          echo "<option value=".$row['id'].">".$row['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td style="font-size:15pt;color:#fff;">
                                    <label for="receiver" align="left">RECEIVER'S NAME: </label>
                                    &nbsp;&nbsp;<select name="receiver" style="font-size: 12pt; height: 28px; width:290px;">
                                    <?php
                                        foreach ($data as $row) {
                                          echo "<option value=".$row['id'].">".$row['name']."</option>";
                                        }    
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <br><label for="amount" style="font-size:15pt;color:#fff;" >AMOUNT:</label> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="number" name="amount" style="font-size: 12pt; height: 28px; width:290px;" min="0" required>
                                </td>
                            </tr>
                            </br>
                            <tr>
                                <td >
                                    <div class="button">
                                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                        <button  type="submit" value="Credit" style="background-color: #f8f9fa;color: #1d2124; font-size:18px;height:40px; width:100px;">Transfer</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </center>
    </body>
</html>