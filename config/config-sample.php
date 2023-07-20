<?php

// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/PHPMailer.php
include '../PHPMailer/PHPMailer.php';
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/SMTP.php
include '../PHPMailer/SMTP.php';
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/Exception.php
include '../PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$from = '';
$to   = '';
$host = 'smtp.mandrillapp.com';
$user = '';
$pass = '';
$auth = true;


// https://mailchimp.com/developer/transactional/docs/smtp-integration/

$smtp = PHPMailer::ENCRYPTION_SMTPS;
$port = 465;

// OR

//$smtp = PHPMailer::ENCRYPTION_STARTTLS;
//$port = 587;
