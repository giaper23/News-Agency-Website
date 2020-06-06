<?php

// Import DotEnv variables
$smtp_host = $_ENV['SMTP_HOST'];
$smtp_username = $_ENV['SMTP_USERNAME'];
$smtp_password = $_ENV['SMTP_PASSWORD'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include needed files
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    // If you're using GMail be sure to enable "Less secure app access" at https://myaccount.google.com/lesssecureapps
    // Start with $mail->SMTPDebug = 2 and when everything is OK and your mail gets send, replace with $mail->SMTPDebug = 0
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $smtp_host;                 // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $smtp_username;           // SMTP username
    $mail->Password   = $smtp_password;                     // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($smtp_username, 'Cosmos News Agency');
    $mail->addAddress($email);           // Add a recipient
//  $mail->addAddress('ellen@example.com');                     // Name is optional
//  $mail->addReplyTo('info@example.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

    // Attachments
//  $mail->addAttachment('/var/tmp/file.tar.gz');               // Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Optional name

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg_body;
    $mail->AltBody = $msg_body;

    $mail->send();
    // echo 'Message has been sent';

} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
