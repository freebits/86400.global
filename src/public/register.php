<?php
require_once dirname(__DIR__).'../../vendor/autoload.php';
define('MAX_USERNAME_LENGTH', 128);
define('MAX_PASSWORD_LENGTH', 32);
define('MAX_PASSWORD_REPEAT_LENGTH', 32);

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$usename = '';
$username_error = '';
$password = '';
$password_error = '';
$password_repeat = '';
$password_repeat_error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password_repeat = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    if (strlen($username) === 0) {
        $username_error = 'Username is required.';
    } elseif (strlen($username) > MAX_USERNAME_LENGTH) {
        $username_error = 'Username must be less than '.MAX_USERNAME_LENGTH.' characters.';
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

    if (empty($username_error) && empty($password_error) && empty($password_repeat_error)) {
        $stripe_customer_id = stripe_create_customer();
        $password_hash = generate_password_hash($password);
        $account_id = add_account($username, $password_hash, $stripe_customer_id);
        grant_session_auth($account_id);
        header('Location: /success.html');
    }
}

echo $twig->render('register_template.twig', ['username_error' => $username_error,
                                             'password_error' => $password_error,
                                             'password_repeat_error' => $password_repeat_error,
                                             'username' => $username
                                            ]);
