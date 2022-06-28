<?php

function check_password(string $username, string $password): boolean
{
    $password_hash = get_password_hash($username);
    return password_verify($password, $password_hash);
}
