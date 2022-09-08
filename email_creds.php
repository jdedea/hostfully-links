<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Mail
{

  function send_email($subject, $message, $to_email)
  {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'forestftp.com';                        //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'noreply@forestftp.com';                   //SMTP username
    $mail->Password = 'Admin@123123';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('noreply@forestftp.com', 'No Reply');
    $mail->addAddress($to_email);        //Add a recipient

    //Content
    $mail->isHTML(true);                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;

    try {
      $mail->send();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

}