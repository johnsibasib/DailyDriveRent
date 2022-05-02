


<!DOCTYPE html>
<html>
<?php 
include('session_client.php'); ?>
<head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body>

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

    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="enterdriver1.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Enter New Staff </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Staff Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Staff Number Code" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" placeholder="Gender" required>
          </div>




          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Login form Staff </h3>

          <form role="form" action="client_registered_success.php" method="POST">

<div class="row">
    <div class="form-group col-xs-12">
        <label for="client_name"><span class="text-danger" style="margin-right: 5px;"></span> Full Name: </label>
        <div class="input-group">
            <input class="form-control" id="client_name" type="text" name="client_name">
            <span class="input-group-btn">

</span>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
        <label for="client_username"><span class="text-danger" style="margin-right: 5px;"></span> Username: </label>
        <div class="input-group">
            <input class="form-control" id="client_username" type="text" name="client_username" >
            <span class="input-group-btn">

</span>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
        <label for="client_email"><span class="text-danger" style="margin-right: 5px;"></span> Email: </label>
        <div class="input-group">
            <input class="form-control" id="client_email" type="email" name="client_email">
            <span class="input-group-btn">

</span>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
        <label for="client_phone"><span class="text-danger" style="margin-right: 5px;"></span> Phone: </label>
        <div class="input-group">
            <input class="form-control" id="client_phone" type="text" name="client_phone" >
            <span class="input-group-btn">

            </span>

        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
        <label for="client_address"><span class="text-danger" style="margin-right: 5px;"></span> Address: </label>
        <div class="input-group">
            <input class="form-control" id="client_address" type="text" name="client_address" >
            <span class="input-group-btn">

</span>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
        <label for="client_password"><span class="text-danger" style="margin-right: 5px;"></span> Password: </label>
        <div class="input-group">
            <input class="form-control" id="client_password" type="password" name="client_password" >
            <span class="input-group-btn">

            </span>

        </div>
    </div>
</div>



<div class="row">
    <div class="form-group col-xs-4">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>

</div>

 
        </form>
      </div>
    </div>
    <div class="col-md-9" style="float: none; margin: 0 auto;">
    <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Staff </h3>
<?php

$user_check=$_SESSION['login_client'];
$sql = "SELECT * FROM driver d WHERE d.client_username='$user_check' ORDER BY driver_name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>     </th>
        <th> Name</th>
        <th> Gender </th>
        <th> Code </th>
        <th> Contact </th>
        <th> Address </th>
        <th> Availability </th>
      </tr>
    </thead>

    <?PHP
      
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["driver_name"]; ?></td>
      <td><?php echo $row["driver_gender"]; ?></td>
      <td><?php echo $row["dl_number"]; ?></td>
      <td><?php echo $row["driver_phone"]; ?></td>
      <td><?php echo $row["driver_address"]; ?></td>
      <td><?php echo $row["driver_availability"]; ?></td>
      
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 Drivers available</center> </h4>

  <?php } ?>

        </form>

</div>        
        </div>
    </div>

</body>

</html>