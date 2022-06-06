<?php
require dirname(__DIR__).'/vendor/autoload.php';

$name = '';
$name_error = '';
$phone = '';
$phone_error = '';
$email = '';
$email_error = '';
$message = '';
$message_error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(strlen($name) === 0) {
      $name_error = 'Name is required.';
    }
    elseif(strlen($name) > 128) {
      $name_error = 'Name must be less than 128 characters.';
    }

    if(strlen($phone) === 0) {
      $phone_error = 'Phone is required.';
    }
    elseif(strlen($phone) > 32) {
      $phone_error = 'Phone must be less than 32 characters.';
    }

    if(strlen($email) === 0) {
      $email_error = 'Email is required.';
    }
    elseif(strlen($email) > 128) {
      $email_error = 'Email must be less than 128 characters.';
    }

    if(strlen($message) === 0) {
      $message_error = 'Message is required.';
    }
    elseif(strlen($message) > 2048) {
      $message_error = 'Message must be less than 2048 characters.';
    }

    if(empty($name_error) &&
      empty($phone_error) &&
      empty($email_error) &&
      empty($message_error)) {
		  add_contact($name, $phone, $email, $message);
		  contact_mail($name, $phone, $email, $message);
          header('Location: /success.html');
      }
}
require_once(dirname(__FILE__).'/lib/views/contact_template.php');

