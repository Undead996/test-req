<?php


namespace App;


class Request
{
    public function __construct(
        private array $server,
        private array $get,
        private array $post,
        private array $cookie,
    ){}

    public function getQuery(): array
    {
        return $this->get;
    }

    public function getQueryParam(string $name): mixed
    {
        return $this->get[$name] ?? null;
    }

    public function getPostArray(): array
    {
        return $this->post;
    }

    public function getPostParam(string $name): mixed
    {
        return $this->post[$name] ?? null;
    }

    public function getCookies(): array
    {
        return $this->cookie;
    }

    public function getCookie(string $name): mixed
    {
        return $this->cookie[$name] ?? null;
    }

    public function getUri(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function getRoot(): string
    {
        return $this->server['DOCUMENT_ROOT'];
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}