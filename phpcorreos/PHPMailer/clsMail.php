<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';



	

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = "smtp.gmail.com";
		$mail->port = 587;

		$mail->Username = "ahimelecc123@gmail.com";
		$mail->Password = "mxrygaqqxocwnjvk";
	

		$mail->setFrom("ahimelecc123@gmail.com","look y cuidado");
		$mail->addAddress("melecitocito@gmail.com","Ahimelec");
		$mail->Subject = "Hola amigo";
		$mail->msgHTML("Hola soy el mensaje");
		$mail->isSMTP(true);
		$mail->CharSet = "UTF-8";

		if ($mail->send()) {
			echo "enviado";
		}else{
			echo $mail->ErrorInfo;
		}



	

