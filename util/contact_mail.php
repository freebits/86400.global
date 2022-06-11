<?php
require dirname(__DIR__).'/vendor/autoload.php';
use Mailgun\Mailgun;

function mail_contact(string $name, string $phone, string $email, string $message): void
{
    $cfg = get_config();
    
    $mailgun_key = $cfg['MAILGUN_KEY'];
    $mailgun_domain = $cfg['MAILGUN_DOMAIN'];
    $mail_to = $cfg['MAIL_TO'];
    $mail_from = $cfg['MAIL_FROM'];
    
    $subject = 'CONTACT: '. $name;
    $body =
        'Name: '. $name.PHP_EOL.
        'Phone: '. $phone.PHP_EOL.
        'Email: '. $email.PHP_EOL.
        'Message: '.PHP_EOL.$message.PHP_EOL;
    
    try {
        $mg = Mailgun::create($mailgun_key);
        $mg->messages()->send($mailgun_domain, [
            'from' => $mail_from,
            'to' => $mail_to,
            'subject' => $subject,
            'text' => $body]);
    } catch (Exception $e) {
        error_log('Mailgun error, email could not be sent');
    }
}
