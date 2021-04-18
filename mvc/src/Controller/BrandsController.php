<?php


namespace Controller;


use App\Request;
use App\View;
use Model\Brand;

class BrandsController
{
    public function actionAll(Request $request): void
    {
        $header = $request->getRoot() . '/view/templates/green/header.html';
        $footer = $request->getRoot() . '/view/templates/green/footer.html';
        $productsPage = $request->getRoot() . '/view/allBrands.php';
        $view = new View($header, $footer);
        $view($productsPage);
    }

    public function actionNew(Request $request, $db): void
    {
        $header = $request->getRoot() . '/view/templates/green/header.html';
        $footer = $request->getRoot() . '/view/templates/green/footer.html';
        $newBrandPage = $request->getRoot() . '/view/newBrand.php';
        $view = new View($header, $footer);
        if ($request->getMethod() === 'POST') {
            $errors = Brand::validate($request->getPostArray());
        }
        $view($newBrandPage, ['errors' => $errors ?? null]);
    }
}