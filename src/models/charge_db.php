<?php
require_once __DIR__.'/../../vendor/autoload.php';

function add_charge(int $account_subscription_id): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO charge (account_subscription_id)
        VALUES (:account_subscription_id)'
    );
    $sth->bindParam(':account_subscription_id', $name, PDO::PARAM_INT);
    $sth->execute();
    $dbh = null;
    return;
}
