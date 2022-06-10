<?php
require dirname(__DIR__).'/vendor/autoload.php';

function add_contact(string $name, string $phone, string $email, string $message) {
    $cfg = get_config();
    try {
        $dbh = new PDO("pgsql:dbname=".$cfg['DB_NAME'], $cfg['DB_USER']);
    }
    catch(Exception $e) {
        error_log('Database Connection Failed: '.$e->getMessage());
        exit;
    }
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
?>
