<?php

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', true);
ini_set('display_errors', true);


$conf = '../config/config.php';
file_exists($conf) || die('Missing config file, please fill and rename /config/config-sample.php to /config/config.php');
include $conf;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output
    $mail->isSMTP();                          //Send using SMTP
    $mail->Host       = $host;                //Set the SMTP server to send through
    $mail->SMTPAuth   = $auth;                //Enable SMTP authentication
    $mail->Username   = $user;                //SMTP username
    $mail->Password   = $pass;                //SMTP password
    $mail->SMTPSecure = $smtp;                //Enable implicit TLS encryption
    $mail->Port       = $port;                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($from);
    $mail->addAddress($to);                   //Add a recipient

    //Content
    $mail->isHTML(true);                      //Set email format to HTML
    $mail->Subject = "Test ".date('Y-m-d H:i:s');
    $mail->Body    = '<b>Hostname:</b> '.gethostname();
    $mail->Body   .= '<br><b>PHP version:</b> '.phpversion();
    $mail->Body   .= '<br><b>SMTP host:</b> '.$host;
    $mail->Body   .= '<br><b>SMTP port:</b> '.$port;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
