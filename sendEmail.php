<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

       
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
     
        $subject = "THANKYOU FOR CONTACTING US!";
        $message = "TRYYYYYYY";
        $sender = "From: shahiprem7890@gmail.com";

        $mail->addAddress ($email);
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
