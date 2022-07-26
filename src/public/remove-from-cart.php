<?php
require_once dirname(__DIR__).'../../vendor/autoload.php';

define('MAX_SUBSCRIPTION_ID_LENGTH', 128);
define('MAX_QUANTITY_LENGTH', 32);
define('MAX_REF_URL_LENGTH', 512);

$subscription_id = '';
$quantity = '';
$ref_url = '';

$subscription_id_error = '';
$quantity_error = '';
$ref_url_errir = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subscription_id = filter_var($_POST['subscription_id'], FILTER_SANITIZE_STRING);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
    $ref_url = filter_var($_POST['ref_url'], FILTER_SANITIZE_STRING);
    
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

    if (strlen($ref_url) === 0) {
        $ref_url_error = 'Ref url is required.';
    } elseif (strlen($ref_url) > MAX_REF_URL_LENGTH) {
        $ref_url_error = 'Ref url must be less than '.MAX_REF_URL_LENGTH.' characters.';
    }

    if (empty($subscription_id_error) && empty($quantity_error) && empty($ref_url_error)) {
        remove_from_cart($subscription_id, $quantity);
        header('Location: '.$ref_url);
    }
}
