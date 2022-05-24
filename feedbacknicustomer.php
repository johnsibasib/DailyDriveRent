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
    <link rel="shortcut icon" type="image/png" href="assets/img/_Logo1000.png">
   
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

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
<body style = "background-color:#090e25; background-size: cover;">
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
<h3 style="text-align: center; color: white;"> What our client said about us.</h3>
<p style="text-align: center; color: white;"> Thank you so much for taking the time to send this! Everyone here at Wheels for a While loves to know that our customers enjoy what we do.</p>
<p style="text-align: center; color: white;"> We are always trying our best to make your experience memorable, and we're glad that we've achieved it!</p>
   <br>
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

<!------footer start--------->
	<footer class="d-flex p-2">
		<p>INSIGHTS</p>
		<p>For more reservation, please click on the link below to contact us.</p> 
        
		<div class="social" >
			<a href="#"><i class="fab fa-facebook-f"onClick="window.open('https://www.facebook.com/wheelsforawhileservices')" data-bs-toggle="tooltip" data-bs-placement="top" title="@TeptechService"></i></a>
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
</body>
</html>