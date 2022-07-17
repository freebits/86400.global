<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
define('MAX_USERNAME_LENGTH', 128);
define('MAX_PASSWORD_LENGTH', 32);
define('MAX_PASSWORD_REPEAT_LENGTH', 32);

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$credit_card_number = '';
$expirary_month = '';
$expirary_year = '';
$cvv = '';

$credit_card_number_error = '';
$expirary_month_error = '';
$expirary_year_error = '';
$cvv_error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $credit_card_number = filter_var($_POST['credit_card_number'], FILTER_SANITIZE_STRING);
    $expirary_month = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $expirary_year = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $cvv = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    if (strlen($credit_card_number) === 0) {
        $credit_card_number_error = 'Username is required.';
    } elseif (strlen($credit_card_number) > MAX_USERNAME_LENGTH) {
        $credit_card_number_error = 'Username must be less than '.MAX_USERNAME_LENGTH.' characters.';
    }

    if (strlen($password) === 0) {
        $password_error = 'Password is required.';
    } elseif (strlen($password) > MAX_PASSWORD_LENGTH) {
        $password_error = 'Password must be less than '.MAX_PASSWORD_LENGTH.' characters.';
    }

    if (strlen($password_repeat) === 0) {
        $password_repeat_error = 'Password repeat is required.';
    } elseif (strlen($password_repeat) > MAX_PASSWORD_REPEAT_LENGTH) {
        $password_repeat_error = 'Passwird must be less than '.MAX_PASSWORD_REPEAT_LENGTH.' characters.';
    }

    if (strcmp($password, $password_repeat) != 0) {
        $password_repeat_error - 'Password does not match';
    }

    if (empty($credit_card_number_error) && empty($password_error) && empty($password_repeat_error)) {
        header('Location: /success.html');
    }
}

echo $twig->render('register_template.twig', ['credit_card_number_error' => $credit_card_number_error,
                                             'password_error' => $password_error,
                                             'password_repeat_error' => $password_repeat_error,
                                             'credit_card_number' => $credit_card_number
                                            ]);
