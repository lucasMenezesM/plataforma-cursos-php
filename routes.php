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
        "uri" => "/cursos",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "index",
        "middleware" => []
    ],
    [
        "uri" => "/cursos/create",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "create",
        "middleware" => ["auth"]
    ],
    [
        "uri" => "/cursos",
        "method" => "POST",
        "controller" => "CoursesController",
        "controllerMethod" => "store",
        "middleware" => ["admin"]
    ],
    [
        "uri" => "/cursos/{id}",
        "method" => "GET",
        "controller" => "CoursesController",
        "controllerMethod" => "show",
        "middleware" => []
    ],
    [
        "uri" => "/cursos/{id}",
        "method" => "DELETE",
        "controller" => "CoursesController",
        "controllerMethod" => "destroy",
        "middleware" => ["admin"]
    ],
    [
        "uri" => "/cursos/{id}",
        "method" => "PUT",
        "controller" => "CoursesController",
        "controllerMethod" => "update",
        "middleware" => ["admin"]
    ]
];
