<?php

class Session
{
    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function clearAll(): void
    {
        session_unset();
        session_destroy();
    }
}
