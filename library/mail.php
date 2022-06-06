<?php
require dirname(__DIR__).'/vendor/autoload.php';
use Mailgun\Mailgun;

function contact_mail($name, $phone, $email, $message) {
    $cfg = get_config();
	$subject = 'CONTACT: '. $name;
	$body =
		'Name: '. $name.PHP_EOL.
		'Phone: '. $phone.PHP_EOL.
		'Email: '. $email.PHP_EOL.
		'Message: '.PHP_EOL.$message.PHP_EOL;

    $mg = Mailgun::create($cfg['MAILGUN_KEY']);
    $mg->messages()->send($cfg['MAIL_DOMAIN'], [
        'from' => $cfg['MAIL_FROM'],
        'to' => $cfg['MAIL_TO'],
        'subject' => $subject,
        'text' => $body]);
}
?>
