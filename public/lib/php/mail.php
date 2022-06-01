<?php
require dirname(dirname(dirname((__DIR__)))).'/vendor/autoload.php';
use Mailgun\Mailgun;

function contact_mail($name, $phone, $email, $message) {

    $from = 'noreply@mail.86400.global';
	$to = 'freebits1@gmail.com';
    $domain = 'mail.web997.com';
    $key = 'key-7a9bb86b317120698eecae4cf3e52143';

	$subject = 'CONTACT: '. $name;
	$body =
		'Name: '. $name.PHP_EOL.
		'Phone: '. $phone.PHP_EOL.
		'Email: '. $email.PHP_EOL.
		'Message: '.PHP_EOL.$message.PHP_EOL;

    $mg = Mailgun::create($key);
    $mg->messages()->send($domain, [
        'from' => $from,
        'to' => $to,
        'subject' => $subject,
        'text' => $body]);
}
?>
