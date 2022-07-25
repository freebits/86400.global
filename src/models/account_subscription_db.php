<?php
require_once __DIR__.'/../../vendor/autoload.php';

function add_account_subscription(int $account_id, int $subscription_id, int $credit_card_id): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO account_subscription(account_id, subscription_id, credit_card_id)
        VALUES (:account_id, :subscription_id, :credit_card_id)'
    );
    $sth->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    $sth->bindParam(':subscription_id', $subscription_id, PDO::PARAM_INT);
    $sth->bindParam(':credit_card_id', $credit_card_id, PDO::PARAM_INT);
    $sth->execute();
    $dbh = null;
    return;
}
