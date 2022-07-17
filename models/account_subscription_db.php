<?php
require dirname(__DIR__).'/vendor/autoload.php';

function add_account_subscription(int $account_id, int $subscription_id, int $credit_card_id): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO account_subscription(account_id, subscription_id, credit_card_id)
        VALUES (:account_id, :subscription_id, :credit_card_id)'
    );
    $sth->bindParam(':account_id', $name, PDO::PARAM_INT);
    $sth->bindParam(':subscription_id', $name, PDO::PARAM_INT);
    $sth->bindParam(':credit_card_id', $name, PDO::PARAM_INT);
    $sth->execute();
    $dbh = null;
    return;
}
