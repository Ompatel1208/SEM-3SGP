<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

function SendNewPassword($email,$pass)
{
  $mail = new PHPMailer(true);
  $alert = '';
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'starkoapplications@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'fmxpelxgkymtmphw'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('starkoapplications@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Account Recover';
    $mail->Body = "<h1><center>Vehical Washing System </center></h1><br>
                    <h3>Your new password </h3><br> <h1><b><big>".$pass."</big></b></h1><br>
                    <p>please change password after login, this password was auto generated</p>";

    $mail->send();
    $alert = true;
    return $alert;
   
  } catch (Exception $e){
    $alert = false;
      return $alert;        
  }
}

function send_otp($email,$otp)
{
$mail = new PHPMailer(true);




  $alert = '';
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'starkoapplications@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'fmxpelxgkymtmphw'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('starkoapplications@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'ONE TIME PASSWORD';
    $mail->Body = "<h1><center>Vehical Washing System </center></h1><br>
                    <h3>Your Verification code is </h3><br> <h1><b><big>".$otp."</big></b></h1>";

    $mail->send();
    $alert = true;
    return $alert;
   
  } catch (Exception $e){
    $alert = false;
      return $alert;        
  }

}
?>
