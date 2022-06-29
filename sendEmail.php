<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

    if (isset($_POST['submit']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

       
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;               // Enable SMTP authentication
        $mail->Username = 'kssthesisgroup@gmail.com';   // SMTP username
        $mail->Password = 'bhgwyjpusounzucw';   // SMTP password
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, ssl also accepted
        $mail->Port = 587;                    // TCP port to connect to

        //Email Settings
        $mail->isHTML(true);
     
        $subject = "INSIGHTS Customer Support | WE RECEIVED YOUR MESSAGE";
        $message = "<h2><center>Your message request has been sent to the customer support team at INSIGHTS Company. <br>You will be notified via email to: <br><br>$email <br><br>If you did not try to reach INSIGHTS Support Simply disregard and delete this email. <br>Probably someone typed their email address improperly.</h2>  <h2><br>Message Details:</h2><h3>Name : $name <br>Email: $email <br>Message : $message</h3>";
        $sender = "From: shahiprem7890@gmail.com";

        $mail->addAddress ($email);
        $mail->addAddress ('insightsofficialweb@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $message;

        if(!$mail->send()) { 
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            var_dump($mail);
            
        }
         else {
            $status = "success";
            $response = "Email is sent!";
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
