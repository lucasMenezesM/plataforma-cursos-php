<?php

class ErrorController
{
    /**
     * Redirects the user to a 404 page.
     *
     * @param string $message
     * @return void
     */
    public static function notFoud($message = "Resource not found"): void
    {
        http_response_code(404);
        loadView("error", ["message" => $message, "statusCode" => 404]);
        exit;
    }

    public static function unauthorized($message = "Not authorized to access this resource"): void
    {
        http_response_code(404);
        loadView("error", ["message" => $message, "statusCode" => 403]);
        exit;
    }
}
