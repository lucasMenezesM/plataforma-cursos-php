<?php

class Authorize
{
    public static function authorize(array $middlewares): void
    {
        foreach ($middlewares as $middleware) {
            if ($middleware === "Auth") {
                if (!Session::has("user")) {
                    header("location: /");
                }
            }

            if ($middleware === "Guest") {
                if (Session::has("user") && Session::get("user")[0]["user_type"] !== "admin") {
                    header("location: /");
                }
            }

            if ($middleware === "Admin") {

                if (Session::has("user") && Session::get("user")[0]["user_type"] !== "admin") {
                    header("location: /");
                }
            }
        }
    }
}
