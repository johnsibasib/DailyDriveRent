
<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>
<head>
<link rel="shortcut icon" type="image/png" href="assets/img/_Logo1000.png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<style>
body {
  background-image: url('assets/img/CLIENTLOGIN.png');
}
</style>
  
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
 
<?php $login_client = $_SESSION['login_client']; 

    $sql1 = "SELECT * FROM rentedcars rc, clientcars cc, customers c, cars WHERE cc.client_username = '$login_client' AND cc.car_id = rc.car_id AND rc.return_status = 'R' AND c.customer_username = rc.customer_username AND cc.car_id = cars.car_id";

    $result1 = $conn->query($sql1);

    if (mysqli_num_rows($result1) > 0) {
?>
<br>
<br>
<br>
<br>
<div class="container">
      <div class="jumbotron" style="background-image: url('assets/img/ADMIN.png');background-size: cover;">
        <h1 style="color: white;">Booking History</h1>
        
      </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="20%">Car</th>
<th width="15%">Customer Name</th>
<th width="20%">Rent Start Date</th>
<th width="20%">Rent End Date</th>
<th width="10%">Distance</th>
<th width="15%">Total Amount</th>
</tr>
</thead>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_name"]; ?></td>
<td><?php echo $row["customer_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td><?php echo $row["distance"]; ?></td>
<td>₱<?php echo $row["total_amount"]; ?></td>
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
     <div class ="jumbotron" style="background-image: url('assets/img/ADMIN.png');background-size: cover;">
        <h1>No booked cars</h1>
        <p> Rent some cars now <?php echo $conn->error; ?> </p>
      </div>
    </div>

            <?php
        } ?>   

</body>

</html>