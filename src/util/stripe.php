<?php
require_once __DIR__.'/../../vendor/autoload.php';

function stripe_create_customer()
{
    $stripe = new \Stripe\StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");
    $customer = json_decode($stripe->customers->create());
    return $customer->id;
}

function stripe_save_card($stripe_customer_id, $cc_number, $exp_month, $exp_year, $cvc)
{
    $stripe = new \Stripe\StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");
    $cc = json_decode(
        $stripe->customers->createSource(
            $stripe_customer_id,
            'source' => array(
            'object' => 'card',
            'number' => $cc_number,
            'exp_month' => $exp_month,
            'exp_year' => $exp_year,
            'cvc' => $cvc,
            )
        )
    );

    return $cc->id;
}

function stripe_charge($amount, $currency, $source)
{
    $stripe = new \Stripe\StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");
    $stripe->charges->create(array(
        'amount' => $amount,
        'currency' => $currency,
        'source' => $source
    ));
}
