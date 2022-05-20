
<!DOCTYPE html>
<html>

<?php 
include('session_client.php'); ?> 
<head>
<link rel="shortcut icon" type="image/png" href="assets/img/_Logo1000.png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body>
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

    <div class="container" style="margin-top: 65px;">
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area" style=" background-image: url('assets/img/ADMIN.png');">
        <form role="form" action="entercar1.php" enctype="multipart/form-data" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px; color: black;"> Add Car</h3>

          <div class="form-group">
            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number (Name Plate Number)" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="ac_price" name="ac_price" placeholder="AC Fare per km (in php)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="non_ac_price" name="non_ac_price" placeholder="Non-AC Fare per km (in php)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="ac_price_per_day" name="ac_price_per_day" placeholder="AC Fare per day (in php)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="non_ac_price_per_day" name="non_ac_price_per_day" placeholder="Non-AC Fare per day (in php)" required>
          </div>

          <div class="form-group">
            <input name="uploadedimage" type="file">
          </div>
           <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Add car</button>    
        </form>
      </div>
    </div>


        <div class="col-md-12" style="float: none; margin: 0 auto;">
    <div class="form-area" style="padding: 0px 100px 100px 100px; background-image: url('assets/img/ADMIN.png');background-size: cover;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px; color: black;"> My Cars </h3>
<?php

$user_check=$_SESSION['login_client'];
$sql = "SELECT * FROM cars WHERE car_id IN (SELECT car_id FROM clientcars WHERE client_username='$user_check');";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>
<div style="overflow-x:auto;">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th></th>
        <th style="color: white;" width="24%"> Name</th>
        <th style="color: white;" width="15%"> Nameplate </th>
        <th style="color: white;" width="13%"> AC Fare (/km) </th>
        <th style="color: white;" width="17%"> Non-AC Fare (/km)</th>
        <th style="color: white;" width="13%"> AC Fare (/day)</th>
        <th style="color: white;" width="17%"> Non-AC Fare (/day)</th>
        <th style="color: white;" width="1%"> Availability </th>
      </tr>
    </thead>

    <?PHP
      
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["car_name"]; ?></td>
      <td><?php echo $row["car_nameplate"]; ?></td>
      <td><?php echo $row["ac_price"]; ?></td>
      <td><?php echo $row["non_ac_price"]; ?></td>
      <td><?php echo $row["ac_price_per_day"]; ?></td>
      <td><?php echo $row["non_ac_price_per_day"]; ?></td>
      <td><?php echo $row["car_availability"]; ?></td>
      
    </tr>
  </tbody>
  <?php } ?>
  </table>
  </div>
    <br>
  <?php } else { ?>
  <h4><center>0 Cars available</center> </h4>
  <?php } ?>
        </form>
</div>        
        </div>
    </div>
</body>

</html>