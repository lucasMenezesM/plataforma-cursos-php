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
        "controller" => "CursosController",
        "controllerMethod" => "index",
        "middleware" => []
    ],
    [
        "uri" => "/cursos",
        "method" => "POST",
        "controller" => "CursosController",
        "controllerMethod" => "create",
        "middleware" => ["admin"]
    ],
    [
        "uri" => "/cursos/{id}",
        "method" => "GET",
        "controller" => "CursosController",
        "controllerMethod" => "show",
        "middleware" => []
    ],
    [
        "uri" => "/cursos/{id}",
        "method" => "DELETE",
        "controller" => "CursosController",
        "controllerMethod" => "destroy",
        "middleware" => ["admin"]
    ],
    [
        "uri" => "/cursos/{id}",
        "method" => "PUT",
        "controller" => "CursosController",
        "controllerMethod" => "update",
        "middleware" => ["admin"]
    ]
];
