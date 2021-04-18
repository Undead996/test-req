<?php


namespace Controller;

use App\Request;
use App\View;
use Model\Product;

class ProductsController
{
    public function actionAll(Request $request, $db): void
    {
        $productsPage = $request->getRoot() . '/view/allProducts.php';
        $view = new View(...$this->getTemplate($request));
        // надо обратится к моедели и получить данные
        $products = Product::getAll($db);
        // передать их в представление
        $view($productsPage, [
            'products' => $products,
            'uri' => $request->getUri(),
        ]);
    }

    public function actionNew(Request $request, $db): void
    {
        $newProductPage = $request->getRoot() . '/view/newProduct.php';
        $view = new View(...$this->getTemplate($request));
        if ($request->getMethod() === 'POST') {
            $errors = Product::validate($request->getPostArray());
        }
        $view($newProductPage, ['errors' => $errors ?? null]);
    }

    private function getTemplate(Request $request): array
    {
        $header = $request->getRoot() . '/view/templates/shop/header.php';
        $footer = $request->getRoot() . '/view/templates/shop/footer.php';
        return [$header, $footer];
    }
}

// Создать для Brands свой шаблон с другим бэкграундом
// и подключить его в брендах