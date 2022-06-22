<!DOCTYPE html>
<html>
<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: login-user.php");
}
?> 
<title>WHEELS FOR A WHILE</title>
<link rel="shortcut icon" type="image/png" href="assets/img/_Logo1000.png">
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   
</head>
<body ng-app=""> 
    <body background="assets/img/booking.png">

      
     <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   WHEELS FOR A WHILE </a>
            </div>
            

            <?php include'alllogins.php';?>

            
        </div>
       
    </nav>
    
<div class="container" style="margin-top: 65px;">
    <div class="col-md-7" style="float: none; margin: 0 auto;background-color: white; border-style: inset; border-color: white; background-image: url('assets/img/booking1.png'); background-size: cover;">
      <div class="form-area" style= "padding: 80px;">
        <form role="form" action="bookingconfirm.php" method="POST">
        <br style="clear: both">
        
         

        <?php
        $car_id = $_GET["id"];
        $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
            while($row1 = mysqli_fetch_assoc($result1)){
                $car_name = $row1["car_name"];
                $car_nameplate = $row1["car_nameplate"];
                $ac_price = $row1["ac_price"];
                $non_ac_price = $row1["non_ac_price"];
                $ac_price_per_day = $row1["ac_price_per_day"];
                $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                $MOP = $row1["MOP"];
            }
        }

        ?>

              <h5 style="color: white;"> Car:&nbsp;<?php echo($car_name);?></h5>
            <h5 style="color: white;"> Vehicle Number:&nbsp; <?php echo($car_nameplate);?></h5>
        <?php $today = date("Y-m-d") ?>
          <label><h5 style="color: white;">Start Date:</h5></label>
            <input type="date" name="rent_start_date" min="<?php echo($today);?>" required="">
            &nbsp;
          <label><h5 style="color: white;">End Date:</h5></label>
          <input type="date" name="rent_end_date" min="<?php echo($today);?>" required="">
        <h5 style="color: white;"> Choose your car type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="ac" ng-model="myVar"> AC &nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="non_ac" ng-model="myVar"> Non-AC
        <div ng-switch="myVar"> 
        <div ng-switch-default>
                    
                <h5 style="color: white;">Fare: <h5>    
                
                     </div>
                    <div ng-switch-when="ac">
                    
                <h5>Fare: <?php echo("₱" . $ac_price . "/km and ₱" . $ac_price_per_day . "/day");?><h5>    
              
                     </div>
                     <div ng-switch-when="non_ac">
                    
                <h5>Fare: <?php echo("₱" . $non_ac_price . "/km and ₱" . $non_ac_price_per_day . "/day");?><h5>    
               
                     </div>
        </div>

         <h5 style="color: white;"> Choose charge type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="days"> per day(s)
            <br><br>

            <form method="POST">
            Mode Of Payment: <select name="subject" id="subject"style="color: black;">
            
            <option value="Cash" selected="selected" style="color: black;">Cash</option>
            </select>
        </form>
            <br><br>
              
                Staff: &nbsp;
                <select name="driver_id_from_dropdown" style="color: black;" ng-model="myVar1;">
                        <?php
                        $sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientcars cc WHERE cc.car_id = '$car_id')";
                        $result2 = mysqli_query($conn, $sql2);

                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $driver_id = $row2["driver_id"];
                                $driver_name = $row2["driver_name"];
                                $driver_gender = $row2["driver_gender"];
                                $driver_phone = $row2["driver_phone"];
                    ?>
  

                    <option value="<?php echo($driver_id); ?>"><?php echo($driver_name); ?>
                   

                    <?php }} 
                    else{
                        ?>
                   
                        <?php
                    }
                    ?>
                </select>
               
                <div ng-switch="myVar1">
                

                <?php
                        $sql3 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientcars cc WHERE cc.car_id = '$car_id')";
                        $result3 = mysqli_query($conn, $sql3);

                        if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){
                                $driver_id = $row3["driver_id"];
                                $driver_name = $row3["driver_name"];
                                $driver_gender = $row3["driver_gender"];
                                $driver_phone = $row3["driver_phone"];

                ?>

                <div ng-switch-when="<?php echo($driver_id); ?>">
                    <h5>Staff:&nbsp; <?php echo($driver_name); ?></h5>
                    <p>Gender:&nbsp; <?php echo($driver_gender); ?> </p>
                    <p>Contact:&nbsp; <?php echo($driver_phone); ?> </p>
                </div>
                <?php }} ?>
                </div>
                <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                
         
           <input type="submit"name="submit" value="Book Now" class="btn btn-success pull-right">     
        </form>
        
      </div>
      <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6 style="color: black;"><strong>Kindly Note:</strong> You will be charged ₱200 for each day after the due date.</h6>
        </div>
    </div>

    <br>
    <br>
    <div class="container py-5">
    <div class="row">
    </div>  
</div> 
</body>

</html>