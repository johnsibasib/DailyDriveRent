<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer;

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kssthesisgroup@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'bhgwyjpusounzucw'; // Gmail address Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('kssthesisgroup@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    $mail->addAddress('insightsofficialweb@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'INSIGHTS Customer Support | WE RECEIVED YOUR MESSAGE';
    $mail->Body = "<h2><center>Your message request has been sent to the customer support team at INSIGHTS Company. <br>You will be notified via email to: <br><br>$email <br><br>If you did not try to reach INSIGHTS Support Simply disregard and delete this email. <br>Probably someone typed their email address improperly.</h2>  <h2><br>Message Details:</h2><h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    
    if(!$mail->send()) { 
      echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
      var_dump($mail);
      
  } else { 
      $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } 
    
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
