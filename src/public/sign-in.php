<?php
require_once dirname(__DIR__).'../../vendor/autoload.php';
define('MAX_USERNAME_LENGTH', 128);
define('MAX_PASSWORD_LENGTH', 32);

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$usename = '';
$username_error = '';
$password = '';
$password_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if (strlen($username) === 0) {
        $username_error = 'Username is required.';
    } elseif (strlen($username) > MAX_USERNAME_LENGTH) {
        $username_error = 'Username must be less than '.MAX_USERNAME_LENGTH.' characters.';
    }

    if (strlen($password) === 0) {
        $password_error = 'Password is required.';
    } elseif (strlen($password) > MAX_PASSWORD_LENGTH) {
        $password_error = 'Passwird must be less than '.MAX_PASSWORD_LENGTH.' characters.';
    }

    if (check_password($username, $password)) {
    }

    if (empty($username_error) && empty($password_error)) {
        header('Location: /success.html');
    }
}

echo $twig->render('sign_in_template.twig', ['username_error' => $username_error,
                                             'password_error' => $password_error,
                                             'username' => $username
                                            ]);
