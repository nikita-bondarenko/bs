<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('naradadasosmi@gmail.com', 'BS группа компаний');
	//Кому отправить
	$mail->addAddress('naradadasosmi@gmail.com');
	//Тема письма
	$mail->Subject = 'Сообщение с сайта "BS группа компаний"';

	$body = '<h1>Письмо от '.htmlspecialchars($_POST['name']).'</h1>';
	
	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.htmlspecialchars($_POST['name']).'</p>';
	}

	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>Email: </strong> '.htmlspecialchars($_POST['email']).'</p>';
	}

	if(trim(!empty($_POST['phone']))){
    		$body.='<p><strong>Номер: </strong> '.htmlspecialchars($_POST['phone']).'</p>';
    	}

    		if(trim(!empty($_POST['comment']))){
            		$body.='<p><strong>Комментарий: </strong> '.htmlspecialchars($_POST['comment']).'</p>';
            	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены по пользователю '.$_POST['name']. ' - '.$_POST['phone']. '';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>
