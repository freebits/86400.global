<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$cart_items = get_cart_items();
$subscriptions = array();

foreach($cart_items as $subscription_id => $quantity) {
    array_push($subscriptions, get_subscription($subscription_id));
}


echo $twig->render('subscriptions_template.twig', ['subscriptions' => $subscriptions ]);
