<?php



// *** Настройки ***

	//$to = 'fintehsoftware@yahoo.com'; 	//Куда отправлять письмо. Через запятую можно перечислить несколько адресатов.
	$to = 'nsenjek.e@yandex.ru'; 	//Куда отправлять письмо. Через запятую можно перечислить несколько адресатов.
	
	//$from = 'no_reply@finteh.world'; //От кого. Некоторые хостинги требуют, чтобы данный адрес существовал.
	$from = 'noreply@finteh.world'; //От кого. Некоторые хостинги требуют, чтобы данный адрес существовал.
	$isSaveToFile = '1'; // Сохранять копию в файл. 1 = да, 0 = нет. 
	$dir_to_save = "./order/"; //Директория для сохранения копии. Лучше размещать выше публичной папки www
	$secret_key = 'key'; //Случайная строка для шифрования имени файла

// *** / Настройки ***	

$f_name=date("Y_m_d")."_".md5($secret_key.date("Y.m.d,h-i-s"));

function _cleardigit ($string) // Функция удаляет все кроме цифр , 
{
	$string =  mb_ereg_replace("[^a-zA-Zа-яА-ЯёЁ0-9_\-(),.@ ]", '', $string ); 
	$string = trim($string);
	return $string;
}


mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
date_default_timezone_set('Europe/Moscow');




/* эти поля должны быть пустыми (антиспам-фильтр) */
$message = '';
if (ISSET($_POST['surname_ssc']))
{
	if (($_POST['surname_ssc'] != '')) { die; };
}


// Отправка с русской версии

if (ISSET($_POST['name']))
{



		
$mess='';
	
$mess1 =  _cleardigit(substr(htmlspecialchars(trim($_POST['name']),ENT_QUOTES, 'utf-8'), 0, 100)); //phones
$mess2  =  _cleardigit(substr(htmlspecialchars(trim($_POST['email']),ENT_QUOTES, 'utf-8'), 0, 200)); //fio
$mess3  =  _cleardigit(substr(htmlspecialchars(trim($_POST['txt']),ENT_QUOTES, 'utf-8'), 0, 2000)); //type

$mess6  = '';
$mess7  = '';
$mess8  = '';
$mess9  = '';
$mess10  = '';
$mess11  = '';
$mess12  = '';
$mess13  = '';
$mess14  = '';


//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////




$mess = "<h1>Message from site, from ".$mess2.",  ".date('Y.m.d,h:i:s')."</h1>
<p>Name: ".$mess1."</p>
<p>Email: ".$mess2."</p>
<p>Text: ".$mess3."</p>

";

$title = "Message from site, from ".$mess2.",  ".date('Y.m.d,h:i:s').""; 
// На случай если какая-то строка письма длиннее 800 символов мы используем wordwrap()
$mess = wordwrap($mess, 20000);

// функция, которая отправляет наше письмо. 
$from = 
"From: $from
Reply-To: $from
Content-Type: text/html; charset=utf-8
Content-Transfer-Encoding: 8bit"
;

//Пишем в файл

	// пишем копию в файл 
	if ($isSaveToFile == '1' )
	{
		
		//создаем файл с служебной инфой 
		$file=fopen($dir_to_save.$f_name.'.html',"w+") or die("Не могу открыть файл на запись!");
		fwrite($file,$mess);
		fclose($file);

	}

//Отправляем письмо
         if (mail($to, $title, $mess, $from))
			{
			$mes1 = 'ok';
			$mes2 = 'sended';
			}
		else 
			{
			//$mes1 = 'error';
			//$mes2 = 'error-server';

			$mes1 = 'ok';
			$mes2 = 'sended';
			}
			

 $result_f = array(
    	'Result' => $mes1,
    	'Value' => $mes2
		    ); 		
			
			echo json_encode($result_f); 
}



?>