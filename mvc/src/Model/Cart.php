<?php


namespace Model;


class Cart
{
    static function add(int $id): void
    {
        $ids = static::get();
        $ids[] = $id;
        $cookieString = implode(',', $ids);
        setcookie(
            'cart',
            $cookieString,
            time() + 30*24*3600,
            '/'
        );
    }

    static function get(): array
    {
        if (isset($_COOKIE['cart'])) {
            return explode(',', $_COOKIE['cart']);
        }
        return [];
    }

    static function count(): int
    {
        return count(static::get());
    }
}