<?php 



require_once('PHPMailer/src/PHPMailer.php');  
require_once('PHPMailer/src/Exception.php'); 
require_once('PHPMailer/src/SMTP.php');  
require_once('controller.php');  


$mail = new PHPMailer\PHPMailer\PHPMailer(true); 

// $mail->SMTPDebug = 2;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.cybernaptics.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'somags.agent.cybernet';                 // SMTP username
$mail->Password = 'Ss3c@0fr14';                           // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;  

$mail->setFrom('hrm@cybernaptics.net', 'Cybernaptics HRM');  

$_SESSION[admins]= get_admins();

foreach ($_SESSION[admins] as $key => $value) {
	
	$mail->addCC($_SESSION[admins][$key][email],$_SESSION[admins][$key][firstname]);
	// pprint($_SESSION[admins]);
	// pprint(get_admins());
	// echo "lala";
}

// echo "lala";



/*

require_once('PHPMailer/src/PHPMailer.php');  
require_once('PHPMailer/src/Exception.php'); 
require_once('PHPMailer/src/SMTP.php');  
require_once('controller.php');  


$mail = new PHPMailer\PHPMailer\PHPMailer(true); 

// $mail->SMTPDebug = 2;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cybernapticsmailer@gmail.com';                 // SMTP username
$mail->Password = 'CyberNapt1cs';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  

$mail->setFrom('cybernapticsmailer@gmail.com', 'Cybernaptics Mailer');  

$_SESSION[admins]= get_admins();

foreach ($_SESSION[admins] as $key => $value) {
	
	$mail->addCC($_SESSION[admins][$key][email],$_SESSION[admins][$key][firstname]);
	// pprint($_SESSION[admins]);
	// pprint(get_admins());
	// echo "lala";
}

*/

 ?>