<?php

namespace MyMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;






class Mailer
{

    private $mail;

    function __construct($email, $password, $port, $subject, $email_content, $sec, $smtp_url, $emailTo)
    {
        $this->mail = new PHPMailer(true);
        $this->setMail($email, $password, $port, $sec, $smtp_url, $emailTo);
        $this->setMessage($subject, $email_content);
        $this->mail->send();
    }

    private function setMail($email, $password, $port, $sec, $smtp_url, $emailTo)
    {
        try {
            $this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = $smtp_url;  // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->Username = $email;                 // SMTP username
            $this->mail->Password = $password;                           // SMTP password
            $this->mail->CharSet = 'UTF-8';
            $this->mail->SMTPSecure = $sec;                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = $port;

            $this->mail->setFrom( $email , 'Mailer');
            $this->mail->addAddress($emailTo, 'Dear BAI');     // Add a recipient
            $this->mail->addReplyTo($emailTo, 'Mailer');
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }
    private function setMessage($subject, $email_content){
        $this->mail->isHTML(true);                                  // Set email format to HTML
        $this->mail->Subject = $subject;
        $this->mail->Body    = $email_content;
        $this->mail->AltBody = 'Alternatywne body';
    }

}