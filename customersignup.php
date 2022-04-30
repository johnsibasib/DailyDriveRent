<html>

<head>
        <title> kotse </title>
        <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
   
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/clientlogin.css">

    <style></style>
    </head>
<body>
     
     <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   kotse </a>
            </div>
            
            <?php include 'alllogins.php'; ?>
                    
        </div>
       
    </nav>
    
            <br>
     

    <div class="container" style="margin-top: -1%; margin-bottom: 2%;">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"> Create Account </div>
                <div class="panel-body">

                    <form role="form" action="customer_registered_success.php" method="POST">

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label> Full Name: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_name" type="text" name="customer_name">
                                    <span class="input-group-btn">
                  
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label> Username: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_username" type="text" name="customer_username">
                                    <span class="input-group-btn">
                  
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label> Email: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_email" type="email" name="customer_email">
                                    <span class="input-group-btn">
                  
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label> Phone: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_phone" type="text" name="customer_phone">
                                    <span class="input-group-btn">
                  
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label> Address: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_address" type="text" name="customer_address">
                                    <span class="input-group-btn">
                  
              </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label> Password: </label>
                                <div class="input-group">
                                    <input class="form-control" id="customer_password" type="password" name="customer_password">
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
                        
                        <label style="margin-left: 5px;"><a href="customerlogin.php">Have an account? Login.</a></label>

                    </form>

                </div>

            </div>

        </div>
    </div>
</body>


</html>