<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

define('MAX_SUBSCRIPTION_ID_LENGTH', 128);
define('MAX_QUANTITY_LENGTH', 32);

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$subscription_id = '';
$quantity = '';

$subscription_id_error = '';
$quantity_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subscription_id = filter_var($_POST['subscription_id'], FILTER_SANITIZE_STRING);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
    
    if (strlen($subscription_id) === 0) {
        $subscription_id_error = 'Subscription ID is required.';
    } elseif (strlen($subscription_id) > MAX_SUBSCRIPTION_ID_LENGTH) {
        $subscription_id_error = 'Subscription ID must be less than '.MAX_SUBSCRIPTION_ID_LENGTH.' characters.';
    }

    if (strlen($quantity) === 0) {
        $quantity_error = 'Quantity is required.';
    } elseif (strlen($quantity) > MAX_QUANTITY_LENGTH) {
        $quantity_error = 'Quantity must be less than '.MAX_QUANTITY_LENGTH.' characters.';
    }

    if (empty($subscription_id_error) && empty($quantity_error)) {
        header('Location: /success.html');
    }
}

echo $twig->render('add_credit_card_template.twig', ['subscription_id_error' => $subscription_id_error,
                                             'quantity_error' => $quantity_error
                                            ]);
