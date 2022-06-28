<?php include 'sendemail.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WHEELS FOR A WHILE</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/_Logo1000.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

<!-- Customized Bootstrap Stylesheet -->
<link href="assets/css/ourteam.css" rel="stylesheet">
  </head>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" style="background-color: grey;border: transparent;background-image: url('assets/img/menubar.png');background-size: cover;"data-toggle="collapse" data-target=".navbar-main-collapse">
                    </button>
                <a class="navbar-brand page-scroll" style="font-weight: bold;font-size:35px;" href="index.php">
                   WHEELS FOR A WHILE </a>
            </div>
           

                     <li>
                        <a href="index.php" style="color:white;">Home</a>
                    </li>
                    <li >
                        <a href="aboutus.php"style="color:white;">About Us</a>
                    </li>
                    <li>
                        <a href="feedbacknicustomer.php" style="color:white;">Feedbacks</a>
                    </li>

                        
        </div>
       
</nav>
  <body>
  
    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->

    <!--contact section start-->
    <div class="contact-section" style="margin-top: 200px;">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>Bay, Laguna, Philippines</div>
        <div><i class="fas fa-envelope"></i>insightsofficialweb@email.com</div>
        <div><i class="fas fa-phone"></i>+63 928 230 8124</div>

      </div>
      <div class="contact-form">
        <h2>Contact Us</h2>
        <form class="contact" action="" method="post">
          <input type="text" name="name" class="text-box" placeholder="Your Name" required>
          <input type="email" name="email" class="text-box" placeholder="Your Email" required>
          <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
      </div>
    </div>
    <!--contact section end-->

    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

  </body>
</html>