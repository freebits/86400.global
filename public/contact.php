<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

define('MAX_NAME_LENGTH', 128)
define('MAX_PHONE_LENGTH', 32)
define('MAX_EMAIL_LENGTH', 128)
define('MAX_MESSAGE_LENGTH', 2048)

$name = '';
$name_error = '';
$phone = '';
$phone_error = '';
$email = '';
$email_error = '';
$message = '';
$message_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITZE_STRING);

    if (strlen($name) === 0) {
        $name_error = 'Name is required.';
    } elseif (strlen($name) > NAME_MAX_LENGTH) {
        $name_error = 'Name must be less than '.NAME_MAX_LENGTH.' characters.';
    }

    if (strlen($phone) === 0) {
        $phone_error = 'Phone is required.';
    } elseif (strlen($phone) > PHONE_MAX_LENGTH) {
        $phone_error = 'Phone must be less than '.PHONE_MAX_LENGTH.' characters.';
    }

    if (strlen($email) === 0) {
        $email_error = 'Email is required.';
    } elseif (strlen($email) > EMAIL_MAX_LENGTH) {
        $email_error = 'Email must be less than '.EMAIL_MAX_LENGTH.' characters.';
    }

    if (strlen($message) === 0) {
        $message_error = 'Message is required.';
    } elseif (strlen($message) > MESSAGE_MAX_LENGTH) {
        $message_error = 'Message must be less than '.MESSAGE_MAX_LENGTH.' characters.';
    }

    if (empty($name_error) &&
      empty($phone_error) &&
      empty($email_error) &&
      empty($message_error)) {
          add_contact($name, $phone, $email, $message);
          mail_contact($name, $phone, $email, $message);
          header('Location: /success.html');
    }
}
require_once(dirname(__DIR__).'/views/contact_template.php');
