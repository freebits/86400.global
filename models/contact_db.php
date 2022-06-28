<?php
require dirname(__DIR__).'/vendor/autoload.php';

function add_contact(string $name, string $phone, string $email, string $message): void
{
    $dbh = get_database();
    $sth = $dbh->prepare(
        'INSERT INTO contact(name, phone, email, message)
        VALUES (:name, :phone, :email, :message)'
    );
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':phone', $phone, PDO::PARAM_STR);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->bindParam(':message', $message, PDO::PARAM_STR);
    $sth->execute();
    $dbh = null;
    return;
}
