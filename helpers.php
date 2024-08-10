<?php

/**
 * Returns the base path
 *
 * @param string $path
 * @return string
 */
function basePath(string $path): string
{
    return __DIR__ . "/" . $path;
}

/**
 * Inspect a data
 *
 * @param mixed $data
 * @return void
 */
function inspect(mixed $data): void
{
    echo "<div>";
    var_dump($data);
    echo "</div>";
}

/**
 * Inspect a data and die
 *
 * @param mixed $data
 * @return void
 */
function inspectAndDie(mixed $data): void
{
    echo "<div>";
    var_dump($data);
    echo "</div>";
    die;
}

function loadView(string $view, array $data = []): void
{
    extract($data);
    require basePath("Views/" . $view . ".view.php");
}

function loadPartial(string $path)
{
    require basePath("Views/partials/" . $path . ".php");
}
