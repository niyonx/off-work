<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require_once('includes/PHPMailer/src/PHPMailer.php');  
require_once('includes/PHPMailer/src/Exception.php'); 
require_once('includes/PHPMailer/src/SMTP.php');  


$mail = new PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cybernapticsmailer@gmail.com';                 // SMTP username
    $mail->Password = 'CyberNapt1cs';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cybernapticsmailer@gmail.com', 'Cybernaptics Mailer');
    $mail->addAddress('nigelyong@myt.mu');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Daileave News';
    $mail->Body    = 'Sona is on leave today.';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}