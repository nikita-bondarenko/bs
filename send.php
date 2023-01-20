

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

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.htmlspecialchars($_POST['name']).'</p>';
	}

	if(trim(!empty($_POST['phone']))){
		$body.='<p><strong>Номер: </strong> '.htmlspecialchars($_POST['phone']).'</p>';
	}

	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>Email:</strong> '.htmlspecialchars($_POST['email']).'</p>';
	}
	if(trim(!empty($_POST['comment']))){
		$body.='<p><strong>Сообщение:</strong> '.htmlspecialchars($_POST['comment']).'</p>';
	}

	$mail->Body = $body;

    $mail->send();

?>
