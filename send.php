

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

	$body.='<p><strong>Имя:</strong> '.htmlspecialchars($_POST['name']).'</p>';

	$body.='<p><strong>Номер: </strong> '.htmlspecialchars($_POST['phone']).'</p>';

	$body.='<p><strong>Email:</strong> '.htmlspecialchars($_POST['email']).'</p>';

	$body.='<p><strong>Сообщение:</strong> '.htmlspecialchars($_POST['comment']).'</p>';

	$mail->Body = $body;

    $mail->send();

?>
