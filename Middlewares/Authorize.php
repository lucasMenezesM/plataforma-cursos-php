<?php

class Authorize
{
    public static function authorize(array $middlewares): void
    {
        foreach ($middlewares as $middleware) {
            if ($middleware === "Auth") {
                if (!Session::has("user")) {
                    header("location: /users/login");
                }
            }

            if ($middleware === "Guest") {
                if (Session::has("user") && Session::get("user")["user_type"] !== "admin") {
                    header("location: /");
                }
            }

            if ($middleware === "Admin") {

                if (Session::has("user") && Session::get("user")["user_type"] !== "admin") {
                    header("location: /");
                }
            }
        }
    }
}
