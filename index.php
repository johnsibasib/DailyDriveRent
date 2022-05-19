<!DOCTYPE html>
<html>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <title>WHEELS FOR A WHILE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="shortcut icon" type="image/png" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/user.css">

    <!-- !!FOOTER!!-->
    <link rel="stylesheet" type="text/css" href="assets/css/ourteam2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Web Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   
    
    
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  
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
    <div style="background-image: url('assets/img/lets.png');min-height: 100%;background-position: center;position: relative;background-size: cover;">
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading" style="color: white;">WHEELS FOR A WHILE</h1>
                            <p class="intro-text">
                                ONLINE CAR RENTAL SERVICES
                            </p>
                            <a href="#sec2" class="btn btn-circle page-scroll blink">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Car</h3>
<br>
        <section class="menu-content">
            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $car_img = $row1["car_img"];
               
                    ?>
            <a href="booking.php?id=<?php echo($car_id) ?>">
            <div class="sub-menu">
            

            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
            <h5> <?php echo $car_name; ?> </h5>
            

            
            </div> 
            </a>
            <?php }}
            else {
                ?>
<h1> There are no available cars, please wait to return! </h1>
                <?php
            }
            ?>                                   
        </section>
                    
    </div>
       
            
        </div>
<!------footer start--------->
<footer class="d-flex p-2">
		<p>INSIGHTS</p>
		<p>For more reservation, please click on the link below to contact us.</p> 
        
		<div class="social" >
			<a href="#"><i class="fab fa-facebook-f"onClick="window.open('https://www.facebook.com/TeptechService')" data-bs-toggle="tooltip" data-bs-placement="top" title="@TeptechService"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i  type="button" onClick="copyText()"class="fas fa-envelope-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="insightsofficialweb@gmail.com"></i></a>
		 </div>
            <img src="img/footer2.png" width="1150">
        <div>
             <img src="img/footer.png" width="1350" height="37">
        </div>
        <p hidden><input  type="text" value="insightsofficialweb@gmail.com" id="myInput" style= "display: block;"></p>

        <script>
            function copyText() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  alert("Text Copied: " + copyText.value);
}
        </script>
    </footer>
    
    </script>
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/theme.js"></script>
</body>

</html>