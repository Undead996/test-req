<?php


namespace Controller;


use App\Request;
use App\View;
use Model\Cart;
use Model\Product;

class OrderController
{
    public function actionDoOrder(Request $request, $db): void
    {
        $orderPage = $request->getRoot() . '/view/order.php';
        $view = new View(...$this->getTemplate($request));
        $ids = Cart::get();
        $products = Product::getByIds($ids, $db);
        $view($orderPage, ['products' => $products]);
    }

    private function getTemplate(Request $request): array
    {
        $header = $request->getRoot() . '/view/templates/shop/header.php';
        $footer = $request->getRoot() . '/view/templates/shop/footer.php';
        return [$header, $footer];
    }
}