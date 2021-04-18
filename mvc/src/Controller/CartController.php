<?php


namespace Controller;


use App\Request;
use Model\Cart;

class CartController
{
    public function actionAdd(Request $request): void
    {
        $id = $request->getQueryParam('id');
        $back = $request->getQueryParam('back');
        // добавим в корзину
        Cart::add((int)$id);
        // вернем обратно
        header('Location: '. $back);
    }
}