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
        "middleware" => ["auth"]
    ],
    [
        "uri" => "/courses",
        "method" => "POST",
        "controller" => "CoursesController",
        "controllerMethod" => "store",
        "middleware" => ["admin"]
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
        "middleware" => ["admin"]
    ],
    [
        "uri" => "/courses/{id}",
        "method" => "PUT",
        "controller" => "CoursesController",
        "controllerMethod" => "update",
        "middleware" => ["admin"]
    ],
    [
        "uri" => "/users/register",
        "method" => "GET",
        "controller" => "UsersController",
        "controllerMethod" => "signupView",
        "middleware" => ["guest"]
    ],
    [
        "uri" => "/users",
        "method" => "POST",
        "controller" => "UsersController",
        "controllerMethod" => "create",
        "middleware" => ["guest"]
    ],
    [
        "uri" => "/users/logout",
        "method" => "GET",
        "controller" => "UsersController",
        "controllerMethod" => "logout",
        "middleware" => ["auth"]
    ],
    [
        "uri" => "/users/login",
        "method" => "GET",
        "controller" => "UsersController",
        "controllerMethod" => "loginView",
        "middleware" => ["guest"]
    ],
    [
        "uri" => "/users/login",
        "method" => "POST",
        "controller" => "UsersController",
        "controllerMethod" => "login",
        "middleware" => ["guest"]
    ]
];
