

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'naradadasosmi@gmail.com';
    $mail->Password = 'cgbftpsmcjfnohrj';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('naradadasosmi@gmail.com');

    $mail->addAddress("info@bscompany.org");

    $mail->isHTML(true);

    $mail->Subject = "Message from bscompany.org";
 
	$body = "<h1>You've received one more message from website!</h1>";
	
	$body.='<p><strong>Name:</strong> '.htmlspecialchars(trim($_POST['name']),ENT_QUOTES, 'utf-8').'</p>';

	$body.='<p><strong>Phone: </strong> '.htmlspecialchars(trim($_POST['phone']),ENT_QUOTES, 'utf-8').'</p>';

	$body.='<p><strong>Email:</strong> '.htmlspecialchars(trim($_POST['email']),ENT_QUOTES, 'utf-8').'</p>';

	$body.='<p><strong>Message:</strong> '.htmlspecialchars(trim($_POST['comment']),ENT_QUOTES, 'utf-8').'</p>';

	$mail->Body = $body;

    $mail->send();

?>
