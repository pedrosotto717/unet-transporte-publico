<?php

function config($key)
{
    $config = require __DIR__ . '/config.php';

    try {
        if (strpos($key, ".") != false) {
            [$key, $value] = explode(".", $key);
            return $config[$key][$value] ?? "";
        } else {
            return $config[$key] ?? [];
        }
    } catch (\Throwable $th) {
        return null;
    }
}

function dump($message)
{
    echo "<pre>";
    var_dump($message);
    echo "</pre>";
}

// redirect without reload page
function push($url)
{
    echo "<script>history.pushState(null, 'url', '/$url');</script>";
}

function redirect($url)
{
    header("Location: $url");
}

// start session if not started
function startSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

// end session if started
function endSession()
{
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }
}

// create session for user
function setSession($key, $value = null)
{
    if (is_array($key)) {
        foreach ($key as $k => $v) {
            $_SESSION[$k] = $v;
        }
    } else {
        $_SESSION[$key] = $value;
    }
}

function getSession($key)
{
    try {
        if (strpos($key, ".") != false) {
            [$key, $value] = explode(".", $key);
            return $_SESSION[$key][$value] ?? "";
        } else {
            return $_SESSION[$key] ?? [];
        }
    } catch (\Throwable $th) {
        return null;
    }
}

function isAuthenticated()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        http_response_code(401);
        redirect("login");
    }
}
