<?php
require_once 'header_link.php';
require 'PHPMailer-master/PHPMailerAutoload.php';

$name = $email;
$token = $tnum;


$emailtext = './email.txt';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'onlinehungrybirds1@gmail.com';          // SMTP username (google account you want message sent from)
$mail->Password = 'onlinehungrybank'; // SMTP password (aka. your google password).
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->setFrom('sender@gmail.com', 'No Reply'); // The from name (ex. 'PickleRick') must be one word & no spaces!
//$mail->addReplyTo('sender2@gmail.com', 'Morty'); // The return name (ex. 'Morty') must be one word & no spaces!
$mail->addAddress($name);   // Add a recipient - THE ADDRESS YOU'RE SENDING YOUR MESSAGE TO.
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('./puppy.jpg', 'dog.jpg'); // optional name

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = nl2br(file_get_contents($emailtext, FILE_USE_INCLUDE_PATH));
$bodyContent = str_replace('%username%', $name, $bodyContent);
$bodyContent = str_replace('%token%', $token, $bodyContent);


$mail->Subject = 'This email came from HungyBirds Online Bank!!!';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
     echo "<script> document.location.href='loginverify.php';</script>";
}
?>