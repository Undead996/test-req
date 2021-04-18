<?php


namespace App;


use Model\Cart;

class View
{
    public function __construct(
        private string $header,
        private string $footer,
    ){}

    public function __invoke(string $view, array $params)
    {
        ob_start();
        include $this->header;
        include $view;
        include $this->footer;
        $page = ob_get_clean();
        echo str_replace([
            '#CART_COUNT#',
        ], [
            Cart::count() ?: '<span class="no_product">(empty)</span>',
        ],
        $page
        );
    }
}