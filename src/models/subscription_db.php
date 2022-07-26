<?php
require_once __DIR__.'/../../vendor/autoload.php';

class Subscription {
    public $name;
    public $price_cents;
    public $billing_period_days;
    public $created;
}

function add_subscription(string $name, int $price_cents, int $billing_period_days): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO subscription(name, price_cents, billing_period_days)
        VALUES (:name, :price_cents, :billing_period_days)'
    );
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':price_cents', $price_cents, PDO::PARAM_INT);
    $sth->bindParam(':billing_period_days', $billing_period_days, PDO::PARAM_INT);
    $sth->execute();
    $dbh = null;
    return;
}

function get_subscriptions()
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'SELECT id, name, price_cents, billing_period_days, created FROM subscription'
    );
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $rows;
}
