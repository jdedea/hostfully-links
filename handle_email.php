<?php
require 'email_creds.php';

$mail = new Mail();

$sender_name = filter_input(INPUT_POST, 'name');
$sender_email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

//  Email
$content = file_get_contents('email_template.html');
$content = str_replace('{{full_name}}', $sender_name, $content);
$content = str_replace('{{email}}', $sender_email, $content);
$content = str_replace('{{message}}', $message, $content);

$mail->send_email('New message from ' . $sender_email, $content, 'jordan@invata.io');
//$mail->send_email('New message from ' . $sender_email, $content, 'caldwelllegacyproperties@gmail.com');

$msg = ['message'=>'success'];

echo json_encode($msg);