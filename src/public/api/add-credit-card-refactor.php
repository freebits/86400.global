<?php
require_once __DIR__.'/../../../vendor/autoload.php';

// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
\Stripe\Stripe::setApiKey('sk_test_wsFx86XDJWwmE4dMskBgJYrt');

function get_cart_total() {
    $cart_total = 0;
    foreach ($cart_items as $subscription_id => $quantity) {
        $cart_total += get_subscription_price($subscription_id) * $quantity;
    }
    return $cart_total;
}


header('Content-Type: application/json');

try {

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => get_cart_total(),
        'currency' => 'usd',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
