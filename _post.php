<?php
require_once './vendor/autoload.php';

mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
date_default_timezone_set('Europe/Moscow');

function _cleardigit ($string) 
{
	$string =  mb_ereg_replace("[^a-zA-Zа-яА-ЯёЁ0-9_\-(),.@ ]", '', $string ); 
	$string = trim($string);
	return $string;
}

if (ISSET($_POST['surname_ssc']))
{
	if (($_POST['surname_ssc'] != '')) { die; };
}

$f_name = date("Y_m_d")."_".md5($secret_key.date("Y.m.d,h-i-s"));
$mess1 = _cleardigit(substr(htmlspecialchars(trim($_POST['name']),ENT_QUOTES, 'utf-8'), 0, 100)); 
$mess2 = _cleardigit(substr(htmlspecialchars(trim($_POST['email']),ENT_QUOTES, 'utf-8'), 0, 200)); 
$mess3 = _cleardigit(substr(htmlspecialchars(trim($_POST['txt']),ENT_QUOTES, 'utf-8'), 0, 2000)); 

if (ISSET($_POST['name']))
{
    $mess = "<h1>Message to Finteh World, from ".$mess2.",  ".date('Y.m.d,h:i:s')."</h1>
    <p>Name: ".$mess1."</p>
    <p>Email: ".$mess2."</p>
    <p>Text: ".$mess3."</p>";
    
    $title = "Message to Finteh World, from ".$mess2.",  ".date('Y.m.d, h:i:s');
    $mess = wordwrap($mess, 20000);
    
    try {
        $transport = (new Swift_SmtpTransport('mail.finteh.world', 465, 'ssl'))
            ->setUsername('noreply@special-in.com')
            ->setPassword('nYK0tfJ6TNv5jc7BddY7')
            ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false, 'verify_peer_name' => false)));
            
        $mailer = new Swift_Mailer($transport);
        $message = new Swift_Message();
        $message->setSubject($title);
        $message->setFrom(['noreply@special-in.com' => 'Special-in']);
        $message->addTo('xxx@yahoo.com');
        $message->addTo('xxx@gmail.com');
        
        $message->setBody($mess, 'text/html');
    
        $result = $mailer->send($message);
    	$mes1 = 'ok';
		$mes2 = 'sended';
        
    } catch (Exception $e) {
        $mes1 = 'error';
		$mes2 = 'error-server';
    }
    
    $result_f = array('Result' => $mes1, 'Value' => $mes2); 		
	echo json_encode($result_f); 
}