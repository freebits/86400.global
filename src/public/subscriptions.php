<?php
require_once __DIR__.'/../../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$subscriptions = get_subscriptions();

var_dump($subscriptions[1]);

echo $twig->render('subscriptions_template.twig', ['subscriptions' => $subscriptions ]);
