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
    <?php 
        $sql4 = "SELECT * FROM poll";
        #$result4 = $conn->query($sql4);
        $result4 = mysqli_query($conn,$sql4);
        if(mysqli_num_rows($result4) > 0)
        {
            while($row = mysqli_fetch_assoc($result4))
            {
?>              
                <div class="col-md-4" style = "border-style: ridge;margin: 20px;">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title" style="color: black;"> <?php echo $row["feedback"]; ?> </h2>
                            <h3 class="card-text" style="color: black;"> <?php echo $row["name"]; ?> </h3>
                            <p class="card-text" style="color: black;">
                                <?php echo $row["suggestions"]; ?>
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
<body>
    
</body>
</html>