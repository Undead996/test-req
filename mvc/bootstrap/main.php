<?php

use App\Request;
use App\Application;
use App\UrlManager;

require 'autoload.php';

// создание объекта запроса
$request = new Request($_SERVER, $_GET, $_POST, $_COOKIE);
// создание менеджера url
$urlManager = new UrlManager(
    __DIR__ . "/../config/routes.ini",
    $request->getUri()
);
// создание объекта пиложения
$app = new Application($request, $urlManager);
// запуск приложения
$app->run();