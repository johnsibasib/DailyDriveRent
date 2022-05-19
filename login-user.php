<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
   
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    

</head>
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
<body style="background-color: #09013D">

    <div class="container">
        <div class="row" >
            <div class="col-md-4 offset-md-4 form login-form"style="margin-left:400px;">
            <div class="panel-body" style="background-image: url('assets/img/CUSTOMER.png');background-size: cover;">
                <form action="login-user.php" method="POST" autocomplete="">
                    <p></p>
                    <H2 class="text-center">Login Form</h2>   
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">dont have account? <a href="signup-user.php">create account</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>