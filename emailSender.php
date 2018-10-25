<?php
require_once '../vendor/autoload.php';
use \MyMailer\Mailer;

if(!isset($_POST["email"]) || empty($_POST["email"]) ||
    !isset($_POST["password"]) || empty($_POST["password"])||
    !isset($_POST["port"]) || empty($_POST["port"]) ||
    !isset($_POST["subject"]) || empty($_POST["subject"]) ||
    !isset($_POST["email_content"]) || empty($_POST["email_content"]) ||
    !isset($_POST["sec"]) || empty($_POST["sec"]) ||
    !isset($_POST["smtp_url"]) || empty($_POST["smtp_url"]) ||
    !isset($_POST["emailTo"]) || empty($_POST["emailTo"])
    ) {
    trigger_error("Brak treści jednego z pól.");
}

$email= $_POST["email"];
$password= $_POST["password"];
$port = $_POST["port"];
$subject = $_POST["subject"];
$emailContent = $_POST["email_content"];
$sec= $_POST["sec"];
$smtp_url=$_POST["smtp_url"];
$emailTo = $_POST["emailTo"];

new Mailer($email, $password, $port, $subject, $emailContent, $sec, $smtp_url, $emailTo);


