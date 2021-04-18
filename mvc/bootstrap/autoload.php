<?php

// организация автозагрузки
spl_autoload_register(function ($namespace) {
    $classMap = [
        // App
        'App\\Request' => __DIR__ . '/../src/App/Request.php',
        'App\\Application' => __DIR__ . '/../src/App/Application.php',
        'App\\UrlManager' => __DIR__ . '/../src/App/UrlManager.php',
        'App\\View' => __DIR__ . '/../src/App/View.php',

        // Controller
        'Controller\\ProductsController' => __DIR__ . '/../src/Controller/ProductsController.php',
        'Controller\\BrandsController' => __DIR__ . '/../src/Controller/BrandsController.php',
        'Controller\\CartController' => __DIR__ . '/../src/Controller/CartController.php',
        'Controller\\OrderController' => __DIR__ . '/../src/Controller/OrderController.php',

        // Model
        'Model\\Brand' => __DIR__ . '/../src/Model/Brand.php',
        'Model\\Product' => __DIR__ . '/../src/Model/Product.php',
        'Model\\Cart' => __DIR__ . '/../src/Model/Cart.php',
    ];
    if (isset($classMap[$namespace])) {
        require_once $classMap[$namespace];
    }
});

require __DIR__ . '/../vendor/autoload.php';