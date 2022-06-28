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

function grant_session_auth(string $username): void
{
    session_start();
    $_SESSION['auth'] = true;
    return;
}

function check_session_auth(): boolean
{
    session_start();
    if (!isset($_SESSION['auth']) {
        return false;
    } else {
        return $_SESSION['auth'];
    }
}

function revoke_session_auth(): void
{
    session_start();
    unset($_SESSION['auth']);
    return;
]
