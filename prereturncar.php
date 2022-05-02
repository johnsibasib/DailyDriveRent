

<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>
<head>
<<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   WHEELS FOR A WHILE </a>
            </div>
           
            <?php include 'alllogins.php';?>
            
        </div>
        
    </nav>
 
<?php $login_customer = $_SESSION['login_customer']; 

    $sql1 = "SELECT c.car_name, rc.rent_start_date, rc.rent_end_date, rc.fare, rc.charge_type, rc.id FROM rentedcars rc, cars c
    WHERE rc.customer_username='$login_customer' AND c.car_id=rc.car_id AND rc.return_status='NR'";
    $result1 = $conn->query($sql1);

    if (mysqli_num_rows($result1) > 0) {
?>

<br>
<br>
<br>
<br>
<div class="container">
      <div class="jumbotron">
        <h1>Return your cars here</h1>
        <p> Hope you enjoyed our service </p>
      </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="30%">Car</th>
<th width="20%">Rent Start Date</th>
<th width="20%">Rent End Date</th>
<th width="20%">Fare</th>
<th width="10%">Action</th>
</tr>
</thead>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td>₱<?php 
    if($row["charge_type"] == "days"){
        echo ($row["fare"] . "/day");
    } else {
        echo ($row["fare"] . "/km");
    }
 

?></td>
<td><a href="returncar.php?id=<?php echo $row["id"];?>"> Return </a></td>
</tr>
<?php        } ?>
                </table>
                </div> 
        <?php } else {
            ?>
            <br>
<br>
<br>
<br>
            <div class="container">
      <div class="jumbotron">
        <h1>No cars to return.</h1>
        <p> Hope you enjoyed our service </p>
      </div>
    </div>

            <?php
        } ?>   

</body>

</html>