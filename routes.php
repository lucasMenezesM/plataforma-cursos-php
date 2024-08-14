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
        "uri" => "/courses/search",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "search",
        "middleware" => []
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
        "uri" => "/courses/edit/{id}",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "editView",
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
    ],
    [
        "uri" => "/enrollments",
        "method" => "GET",
        "controller" => "EnrollmentController",
        "controllerMethod" => "showAll",
        "middleware" => ["Auth"]
    ],
    [
        "uri" => "/enrollments",
        "method" => "POST",
        "controller" => "EnrollmentController",
        "controllerMethod" => "enroll",
        "middleware" => ["Auth"]
    ],
    [
        "uri" => "/enrollments",
        "method" => "DELETE",
        "controller" => "EnrollmentController",
        "controllerMethod" => "destroy",
        "middleware" => ["Auth"]
    ],
    [
        "uri" => "/comments",
        "method" => "POST",
        "controller" => "CommentsController",
        "controllerMethod" => "create",
        "middleware" => ["Auth"]
    ],
    [
        "uri" => "/comments",
        "method" => "DELETE",
        "controller" => "CommentsController",
        "controllerMethod" => "destroy",
        "middleware" => ["Auth"]
    ]
];
