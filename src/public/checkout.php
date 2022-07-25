<?php

$cart_items = get_cart();
$subscriptions = array();

foreach($cart_items as $subscription_id => $quantity)
{
    for($i = 0; $i < $quantity; $i++)
    {
        add_account_subscription($account_id, $s['id'], $credit_card_id);
    }
}

