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
<body background="assets/img/confirm.png">

<?php 
$id = $_GET["id"];
$distance = NULL;
$distance_or_days = $conn->real_escape_string($_POST['distance_or_days']);
$fare = $conn->real_escape_string($_POST['hid_fare']);
$total_amount = $distance_or_days * $fare;
$car_return_date = date('Y-m-d');
$return_status = "R";
$login_customer = $_SESSION['login_customer'];

$sql0 = "SELECT rc.id, rc.rent_end_date, rc.charge_type, rc.rent_start_date,rc.MOP, c.car_name, c.car_nameplate FROM rentedcars rc, cars c WHERE id = '$id' AND c.car_id = rc.car_id";
$result0 = $conn->query($sql0);

if(mysqli_num_rows($result0) > 0) {
    while($row0 = mysqli_fetch_assoc($result0)){
            $rent_end_date = $row0["rent_end_date"];  
            $rent_start_date = $row0["rent_start_date"];
            $car_name = $row0["car_name"];
            $car_nameplate = $row0["car_nameplate"];
            $charge_type = $row0["charge_type"];
            $MOP = $row0["MOP"];
    }
}

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

$extra_days = dateDiff("$rent_end_date", "$car_return_date");
$total_fine = $extra_days*200;

$duration = dateDiff("$rent_start_date","$rent_end_date");

if($extra_days>0) {
    $total_amount = $total_amount + $total_fine;  
}

if($charge_type == "days"){
    $no_of_days = $distance_or_days;
    $sql1 = "UPDATE rentedcars SET car_return_date='$car_return_date', no_of_days='$no_of_days', total_amount='$total_amount', return_status='$return_status' WHERE id = '$id' ";
} else {
    $distance = $distance_or_days;
    $sql1 = "UPDATE rentedcars SET car_return_date='$car_return_date', distance='$distance', no_of_days='$duration', total_amount='$total_amount', return_status='$return_status' WHERE id = '$id' ";
}

$result1 = $conn->query($sql1);

if ($result1){
     $sql2 = "UPDATE cars c, driver d, rentedcars rc SET c.car_availability='yes', d.driver_availability='yes' 
     WHERE rc.car_id=c.car_id AND rc.driver_id=d.driver_id AND rc.customer_username = '$login_customer' AND rc.id = '$id'";
     $result2 = $conn->query($sql2);
}
else {
    echo $conn->error;
}
?>
<br>
<br>
    <h2 class="text-center" style="color: white;"> Thank you for visiting! We wish you have a safe ride. </h2>
    <div class="container">
    <div class="container" style="margin-bottom: 65px; margin-top:0">
    <div class="col-md-7" style="float: none; margin: 0 auto; border-style: inset; background-image: url('assets/img/confirm1.png'); background-size: cover;">

        <h4 style="color: black;" class="text-center">Please read the following information about your order.</h4>
                <h3 style="color: black;">Details:</h3>
                <br>

            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4 style="color: white;"> <strong>Vehicle Name: </strong> <?php echo $car_name;?></h4>
                <br>
                <h4 style="color: white;"> <strong>Vehicle Number:</strong> <?php echo $car_nameplate; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Fare:&nbsp;</strong>  ₱<?php 
            if($charge_type == "days"){
                    echo ($fare . "/day");
                } else {
                    echo ($fare . "/km");
                }
            ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Mode Of Payment: </strong> <?php echo $MOP;?></h4>
                <br>
                <h4 style="color: white;"> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4 style="color: white;"> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Rent End Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4 style="color: white;"> <strong>Car Return Date: </strong> <?php echo $car_return_date; ?> </h4>
                <br>
                <?php if($charge_type == "days"){?>
                    <h4 style="color: white;"> <strong>Number of days:</strong> <?php echo $distance_or_days; ?>day(s)</h4>
                <?php } else { ?>
                    <h4 style="color: white;"> <strong>Distance Travelled:</strong> <?php echo $distance_or_days; ?>km(s)</h4>
                <?php } ?>
                <br>
                <?php
                    if($extra_days > 0){
                        
                ?>
                <h4 style="color: white;"> <strong>Total Fine:</strong> <label class="text-danger"> ₱<?php echo $total_fine; ?>/- </label> for <?php echo $extra_days;?> extra days.</h4>
                <br>
                <?php } ?>
                <h4 style="color: white;"> <strong>Total Amount: </strong> ₱<?php echo $total_amount; ?>/-     </h4>
                <a href="feedbackdes.php">
                <input value="Next" class="btn btn-success pull-right" >
                </a>
                <br>
            </div>
        </div>
        <br>
        <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6 style="color: white;">Warning! <strong>Do not reload this page</strong> or the above display will be lost. If you want a hardcopy of this page, please print it now.</h6>
            
        </div>
    </div>

</body>

</html>