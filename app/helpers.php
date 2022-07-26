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
