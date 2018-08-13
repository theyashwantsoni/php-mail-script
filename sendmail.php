<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		require 'mailer/Exception.php';
		require 'mailer/PHPMailer.php';
		require 'mailer/SMTP.php';
		require 'mailer/POP3.php';
		require 'mailer/OAuth.php';
function sendmaiil($recipent_id,$recipent_name,$body,$sub){
		
		
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                               
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  				// Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'yashwantsoni009@gmail.com';                 // SMTP username
		    $mail->Password = '*********';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('yashwantsoni009@gmail.com', 'Yashwant');
		    $mail->addAddress($recipent_id,$recipent_name);    
		              
		    $mail->addReplyTo('yashwantsoni009@gmail.com', 'Yashwant');
		    
		    $mail->isHTML(true);                               
		    $mail->Subject = $sub;
		    $mail->Body    = '<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		h1{
			text-align: center;background-color: #2F2C2C;color:white;font-weight: 100;
			display: inline-block;
			padding-right: 15px;
			padding-left: 15px;
			border-radius: 5px;
		}
		div{
			background-color: #F4F8FF;
			width: 600px;
			margin: auto;
			padding: 20px;
			}
		a{
			/*text-decoration: none;*/
			text-align: justify;
		}
		p{
			line-height: 20px;
			letter-spacing: 1.1px;
			font-family: arial;
			font-size: 0.9em;
		}
		blockquote{
			/*text-align:center;*/
			font-family: verdana;
			font-weight: 100%;
		}
		section{
			width:400px;
			margin:auto;
		}
		span{
			font-weight:bold;
		}
	</style>
</head>
<body>
<div>
	
	<p>Hi '.$recipent_name.',</p><p>
	'.$body.'</p>

	<p>Warm Regards,</p>
	<p>Yashwant Soni</p>
	
</div>
</body>
</html>';
		    $mail->AltBody = $body;

		    $mail->send();
		    echo 'mail has been sent';
			echo '<br>';
		} catch (Exception $e) {
		    echo 'Mail could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
			echo '<br>';		
		}
}

$body="testing";
 sendmaiil($email,$name,$body,$sub);
?>
