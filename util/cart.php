<?php

function init_cart() {
    session_start();
    if(!array_key_exists('cart', $_SESSION)) {
        $_SESSION['cart'] = array();
    }
}

function add_to_cart(int $subscription_id) {
    session_start();
    init_cart();
    if(!array_key_exists($subscription_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$subscription_id] = 1;
    } else {
        $_SESSION['cart'][$subscription_id] += 1;
    }
}

function remove_from_cart(int $subscription_id) {
    session_start();
    init_cart();

    if($_SESSION['cart'][$subscription_id] === 1) {
        unset($_SESSION['cart'][$subscription_id]);   
    } else {
        $_SESSION['cart'][$subscription_id] -= 1;
    }

}

function get_cart() {
    session_start();
    init_cart();

    return $_SESSION['cart']
}
