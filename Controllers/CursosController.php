<?php

class CursosController
{
    public function index()
    {
        echo "cursos loaded";
    }

    public function show($params)
    {
        $id = $params["id"];
        echo "id: " . $id;
    }
}
