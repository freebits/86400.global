<?php
require_once __DIR__.'/../../vendor/autoload.php';

function add_credit_card(string $card_reference, int $account_id): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO credit_card(card_reference, account_id)
        VALUES (:card_reference, :account_id)'
    );
    $sth->bindParam(':card_reference', $card_reference, PDO::PARAM_STR);
    $sth->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    $sth->execute();
    $dbh = null;
    return;
}
