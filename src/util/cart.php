<?php
require_once __DIR__.'/../../vendor/autoload.php';

function init_cart()
{
    session_start();
    if (!array_key_exists('cart', $_SESSION)) {
        $_SESSION['cart'] = array();
    }
}

function add_to_cart(int $subscription_id, int $quantity)
{
    session_start();
    init_cart();
    if (!array_key_exists($subscription_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$subscription_id] = $quantity;
    } else {
        $_SESSION['cart'][$subscription_id] += $quantity;
    }
}

function remove_from_cart(int $subscription_id, int $quantity)
{
    session_start();
    init_cart();

    if ($_SESSION['cart'][$subscription_id] <= $quantity) {
        unset($_SESSION['cart'][$subscription_id]);
    } else {
        $_SESSION['cart'][$subscription_id] -= $quantity;
    }
}

function get_cart()
{
    session_start();
    init_cart();

    return $_SESSION['cart'];
}
