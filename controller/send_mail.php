<?php
require_once 'dbase_conn.php';
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', '465', 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

$body = 'Seasons Greetings, this is a test running mail on sending automatic mails at a button click.
Thank you sir';
// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(EMAIL)
    ->setTo(['academyblessedhigh@gmail.com', 'nwosubfc20002@yahoo.com', 'janejosh16@gmail.com'])
    ->setBody($body);

// Send the message
$result = $mailer->send($message);
