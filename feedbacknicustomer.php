<!DOCTYPE html>
<html lang="en">
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/user.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
   
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- Navigation -->
   
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" style="background-color: grey;border: transparent;background-image: url('assets/img/menubar.png');background-size: cover;"data-toggle="collapse" data-target=".navbar-main-collapse">
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   WHEELS FOR A WHILE </a>
            </div>
           

            <?php include 'alllogins.php'; ?>

                        
        </div>
       
</nav>
<br>
<br>
<br>
<div>
<br>
<br>
<h1 style="text-align: center; color: white; font-size: 50px;"> What our client said about us.</h1>
<h5 style="text-align: center; color: white;"> Thank you so much for taking the time to send this! Everyone here at Wheels for a While loves to know that our customers enjoy what we do.</h5>
<h5 style="text-align: center; color: white;"> We are always trying our best to make your experience memorable, and we're glad that we've achieved it!</h5>
   <?php 
        $sql4 = "SELECT * FROM poll";
        #$result4 = $conn->query($sql4);
        $result4 = mysqli_query($conn,$sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_assoc($result4))
            {
?>              
                <div class=" d-flex justify-content-center col-md-3" style = "border-style: ridge; border-color: #09013D;  margin: 20px; margin-left: 80px; border-radius:30px; background: rgb(228, 227, 227, 0.40);">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title" style="color: black; text-align: center"> <?php echo $row["feedback"]; ?> </h3>
                            <h2 class="card-text" style="color: black; text-align: center"> " <?php echo $row["suggestions"]; ?> " </h2>
                            <p class="card-text" style="color: black;text-align: right">-
                                <?php echo $row["name"]; ?>
                            </p>
                        </div>
                    </div>  
                </div>              
<?php
                
            }
        }
        else
        {
            echo"No Faculty Found"; 
        }
?>
</div>
</head>
<body style = "background-color:#090e25; background-size: cover;">

</body>
</html>