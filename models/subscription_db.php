<?php
require dirname(__DIR__).'/vendor/autoload.php';

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
        'SELECT (id, name, price_cents, billing_period_days) FROM subscription'
    );
    $sth->execute();
    $rows = $sth->fetchAll();
    $dbh = null;
    return $rows;
}
