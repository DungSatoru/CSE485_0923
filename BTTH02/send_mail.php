<?php

require 'vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not insde a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $name, $title, $content)
{
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Mailer = "smtp";
  try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->Username = 'dungha.4work@gmail.com';          // SMTP username of gmail
    $mail->Password = 'deccjbvtrxezdmjj';                 // SMTP password of gmail
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = "UTF-8";

    //Recipients
    $mail->setFrom('dungha.4work@gmail.com', 'Dung Ha For Work');      // provide your gmail username 
    $mail->addAddress($email, $name);                     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body = $content;                               //write the html code

    $mail->send();
  } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
}
