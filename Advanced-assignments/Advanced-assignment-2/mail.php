<?php

use PHPMailer\PHPMailer\PHPMailer;

require './vendor/autoload.php';
require './config.php';

function send_mail($email, $subject, $message)
{
  // Create PHPMailer object
  $mail = new PHPMailer(true);
  // Use SMPT Protocol to send the message.
  $mail->isSMTP();
  // Setting SMTPAuth to TRUE to use gmail credentials for sending message.
  $mail->SMTPAuth = TRUE;
  // Set configurations.
  $mail->Host = MAILHOST;
  $mail->Username = USERNAME;
  $mail->Password = PASSWORD;
  // Set SMTPSecure to ENCRYPTION_STARTTLS to ensure encrypted conversation
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;
  $mail->setFrom(SENT_FROM, SENT_FROM_NAME);
  // Set recipient mail.
  $mail->addAddress($email);
  $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
  $mail->isHTML();
  $mail->Subject = $subject;
  $mail->Body = $message;
  $mail->AltBody = $message;
  if (!$mail->send()) {
    return 'Error sending the message.';
  }
  else {
    return 'Success';
  }
}
