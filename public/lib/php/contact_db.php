<?php

function add_contact(string $name, string $phone, string $email, string $message) {
  $dbh = new PDO("pgsql:dbname=86400.global", "ubuntu");
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
