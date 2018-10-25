<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "postmaster@baibaibai.pl";                 // SMTP username
    $mail->Password = "950aafc4279a14c9953c653f204a17a7-a3d67641-dedb8164";                           // SMTP password
    $mail->CharSet = 'UTF-8';
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //$mail->SMTPAuth = true;



    //Recipients
    $mail->setFrom('postmaster@baibaibai.pl', 'Mailer');
    $mail->addAddress('teresher935@gmail.com', 'Dear BAI');     // Add a recipient
    $mail->addReplyTo('teresher935@gmail.com', 'Mailer');

    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Jakis temat P.Chowratowicz';
    $mail->Body    = 'P.<b>Chowratowicz</b>';
    $mail->AltBody = 'Alternatywne body';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}