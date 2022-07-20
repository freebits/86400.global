<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

define('MAX_CREDIT_CARD_NUMBER_LENGTH', 128);
define('MAX_EXPIRY_MONTH_LENGTH', 32);
define('MAX_EXPIRY_YEAR_LENGTH', 32);
define('MAX_CVV_LENGTH', 32);

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$credit_card_number = '';
$expiry_month = '';
$expiry_year = '';
$cvv = '';

$credit_card_number_error = '';
$expiry_month_error = '';
$expiry_year_error = '';
$cvv_error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $credit_card_number = filter_var($_POST['credit_card_number'], FILTER_SANITIZE_STRING);
    $expiry_month = filter_var($_POST['expiry_month'], FILTER_SANITIZE_STRING);
    $expiry_year = filter_var($_POST['expiry_year'], FILTER_SANITIZE_STRING);
    $cvv = filter_var($_POST['cvv'], FILTER_SANITIZE_STRING);
    
    if (strlen($credit_card_number) === 0) {
        $credit_card_number_error = 'Credit card number is required.';
    } elseif (strlen($credit_card_number) > MAX_CREDIT_CARD_NUMBER_LENGTH) {
        $credit_card_number_error = 'Credit card number must be less than '.MAX_CREDIT_CARD_NUMBER_LENGTH.' characters.';
    }

    if (strlen($expiry_month) === 0) {
        $expiry_month_error = 'expiry month is required.';
    } elseif (strlen($expiry_month) > MAX_expiry_MONTH_LENGTH) {
        $expiry_month_error = 'expiry month must be less than '.MAX_expiry_MONTH_LENGTH.' characters.';
    }

    if (strlen($expiry_year) === 0) {
        $expiry_year_error = 'expiry year is required.';
    } elseif (strlen($expiry_year) > MAX_expiry_YEAR_LENGTH) {
        $expiry_year_error = 'expiry year must be less than '.MAX_expiry_YEAR_LENGTH.' characters.';
    }

    if (strlen($cvv) === 0) {
        $cvv_error = 'CVV is required.';
    } elseif (strlen($cvv) > MAX_CVV_LENGTH) {
        $cvv_error = 'CVV must be less than '.MAX_CVV_LENGTH.' characters.';
    }

    if (empty($credit_card_number_error) && empty($expiry_month_error) && empty($expiry_year_error) && empty($cvv_error)) {
        header('Location: /success.html');
    }
}

echo $twig->render('add_credit_card_template.twig', ['credit_card_number_error' => $credit_card_number_error,
                                             'expiry_month_error' => $expiry_month_error,
                                             'expiry_year_error' => $expiry_year_error,
                                             'cvv_error' => $cvv_error
                                            ]);
