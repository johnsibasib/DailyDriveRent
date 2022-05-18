<!DOCTYPE html>
<html>

<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?>

<head>
<script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

</head>

    <body background="assets/img/confirm.png">

<?php


    $type = $_POST['radio'];
    $charge_type = $_POST['radio1'];
    $driver_id = $_POST['driver_id_from_dropdown'];
    $customer_username = $_SESSION["login_customer"];
    $car_id = $conn->real_escape_string($_POST['hidden_carid']);
    $rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
    $rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
    $return_status = "NR"; // not returned
    $fare = "NA";
    $MOP = $_POST['subject'];


    function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }
    
    $err_date = dateDiff("$rent_start_date", "$rent_end_date");

    $sql0 = "SELECT * FROM cars WHERE car_id = '$car_id'";
    $result0 = $conn->query($sql0);

    if (mysqli_num_rows($result0) > 0) {
        while($row0 = mysqli_fetch_assoc($result0)) {

            if($type == "ac" && $charge_type == "km"){
                $fare = $row0["ac_price"];
            } else if ($type == "ac" && $charge_type == "days"){
                $fare = $row0["ac_price_per_day"];
            } else if ($type == "non_ac" && $charge_type == "km"){
                $fare = $row0["non_ac_price"];
            } else if ($type == "non_ac" && $charge_type == "days"){
                $fare = $row0["non_ac_price_per_day"];
            } else {
                $fare = "NA";
            }
        }
    }
    if($err_date >= 0) { 

    try {

        $sql1 = "INSERT into rentedcars(customer_username,car_id,driver_id,booking_date,rent_start_date,rent_end_date,fare,charge_type,return_status,MOP) 
        VALUES('" . $customer_username . "','" . $car_id . "','" . $driver_id . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $fare . "','" . $charge_type . "','" . $return_status . "','" . $MOP . "')";
    
        
    
        $result1 = $conn->query($sql1);
    }  catch(Exception $e) {
        die($e->getMessage());
    }


    $sql2 = "UPDATE cars SET car_availability = 'no' WHERE car_id = '$car_id'";
    $result2 = $conn->query($sql2);

    $sql3 = "UPDATE driver SET driver_availability = 'no' WHERE driver_id = '$driver_id'";
    $result3 = $conn->query($sql3);

    $sql4 = "SELECT * FROM  cars c, clients cl, driver d, rentedcars rc WHERE c.car_id = '$car_id' AND d.driver_id = '$driver_id' AND cl.client_username = d.client_username";
    $result4 = $conn->query($sql4);


    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_assoc($result4)) {
            $id = $row["id"];
            $car_name = $row["car_name"];
            $car_nameplate = $row["car_nameplate"];
            $driver_name = $row["driver_name"];
            $driver_gender = $row["driver_gender"];
            $dl_number = $row["dl_number"];
            $driver_phone = $row["driver_phone"];
            $client_name = $row["client_name"];
            $client_phone = $row["client_phone"];
            $MOP = $row["MOP"];
        }
    }

    if (!$result1 | !$result2 | !$result3){
        die("Couldnt enter data: ".$conn->error);
    }

?>

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

<br>
<br>
<br>
    <div class="container">
    <div class="container" style="margin-bottom: 0px; margin-top:0">
    <div class="col-md-7" style="float: none; margin: 0 auto; border-style: inset; background-image: url('assets/img/confirm1.png'); background-size: cover;">
      <div class="form-area" style= "padding: 0px;"> </div>
        
        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                <h3 style="color: black;">Confirmation Process</h3>
                <br>
                <h3 style="color: black;">Booking</h3>
                <br>
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4 style="color: white;"> <strong>Vehicle Name: </strong> <?php echo $car_name; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Vehicle Number:</strong> <?php echo $car_nameplate; ?></h4>
                <br>
                
                <?php     
                if($charge_type == "days"){
                ?>
                     <h4 style="color: white;"> <strong>Fare:</strong> ₱<?php echo $fare; ?>/day</h4>
                <?php } else {
                    ?>
                    <h4 style="color: white;"> <strong>Fare:</strong> ₱<?php echo $fare; ?>/km</h4>

                <?php } ?>
                <br>
                <h4 style="color: white;"> <strong>Mode Of Payment: </strong> <?php echo $MOP; ?> </h4>
                <br>
                <h4 style="color: white;"> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4 style="color: white;"> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Staff License number: </strong>  <?php echo $dl_number; ?> </h4>
                <br>
                <h4 style="color: white;"> <strong>Staff Contact:</strong>  <?php echo $driver_phone; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Staff Name:</strong>  <?php echo $client_name; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Staff Contact: </strong> <?php echo $client_phone; ?></h4>
                <br>
            </div>
        </div>
     
    </div>
</body>
<?php } else { ?>
    <!-- Navigation -->
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
    <div class="container">
	<div class="jumbotron" style="text-align: center;">
        You have selected an incorrect date.
        <br><br>
    </div>
</div>
                <?php } ?>
                </body>


</html>