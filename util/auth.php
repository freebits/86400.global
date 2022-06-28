<?php

function check_password(string $username, string $password): boolean
{
    $password_hash = get_password_hash($username);
    return password_verify($password, $password_hash);
}


function generate_password_hash(string $clear_text_password): string
{
    return password_hash($clear_text_password, PASSWORD_DEFAULT);
}
