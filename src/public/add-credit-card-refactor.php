<?php
require_once __DIR__.'/../../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, []);

$subscriptions = get_subscriptions();

echo $twig->render('add_credit_card_refactor.twig');
