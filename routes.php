<?php

return [
    [
        "uri" => "/",
        "method" => "GET",
        "controller" => "HomeController",
        "controllerMethod" => "index",
        "middleware" => []
    ],
    [
        "uri" => "/courses",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "index",
        "middleware" => []
    ],
    [
        "uri" => "/courses/create",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "create",
        "middleware" => ["Auth", "Admin"]
    ],
    [
        "uri" => "/courses",
        "method" => "POST",
        "controller" => "CoursesController",
        "controllerMethod" => "store",
        "middleware" => ["Admin"]
    ],
    [
        "uri" => "/courses/{id}",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "show",
        "middleware" => []
    ],
    [
        "uri" => "/courses/{id}",
        "method" => "DELETE",
        "controller" => "CoursesController",
        "controllerMethod" => "destroy",
        "middleware" => ["Auth", "Admin"]
    ],
    [
        "uri" => "/courses/{id}",
        "method" => "PUT",
        "controller" => "CoursesController",
        "controllerMethod" => "update",
        "middleware" => ["Auth", "Admin"]
    ],
    [
        "uri" => "/users/register",
        "method" => "GET",
        "controller" => "UsersController",
        "controllerMethod" => "signupView",
        "middleware" => ["Guest"]
    ],
    [
        "uri" => "/users",
        "method" => "POST",
        "controller" => "UsersController",
        "controllerMethod" => "create",
        "middleware" => ["Guest"]
    ],
    [
        "uri" => "/users/logout",
        "method" => "GET",
        "controller" => "UsersController",
        "controllerMethod" => "logout",
        "middleware" => ["Auth"]
    ],
    [
        "uri" => "/users/login",
        "method" => "GET",
        "controller" => "UsersController",
        "controllerMethod" => "loginView",
        "middleware" => ["Guest"]
    ],
    [
        "uri" => "/users/login",
        "method" => "POST",
        "controller" => "UsersController",
        "controllerMethod" => "login",
        "middleware" => ["Guest"]
    ]
];
