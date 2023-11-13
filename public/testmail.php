<?php
 
	// if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['full_name'])) {
	//     //$day = $_POST['day'];
	//     $phone = $_POST['phone'];
	//     $name = $_POST['name'];
	//     $full_name = $_POST['full_name'];
	// }
 
	// $message = "
	// 			Имя: $name<br>
	// 			Фамилия: $full_name<br>
	// 			Контактный телефон: $phone<br>";
$message = "тестовый текст сообщения";
 
$to = "manenkoff17@yandex.ru";
$subject = "Test Mail";
$from = "info@protrenerovki.ru";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= "From: <".$from.">\r\n";
$headers .= 'Cc: info@protrenerovki.ru' . "\r\n";
 
if (mail($to,$subject,$message,$headers)) {
	echo "OK";
}
else {
	// echo "Error";
	exit("Server received '{$to}' from your browser.");
}
 
?>