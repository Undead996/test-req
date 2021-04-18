<?php


namespace App;


class UrlManager
{
    private array $routes;
    private string $uri;

    public function __construct(
        string $routesFilePath,
        string $uri,
    )
    {
        $this->routes = parse_ini_file($routesFilePath, true);
        $this->uri = explode('?', $uri)[0];
    }

    public function parse(): array
    {
        return $this->routes[$this->uri];
    }
}