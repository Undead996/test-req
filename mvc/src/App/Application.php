<?php


namespace App;


use Mysqli;


class Application
{
    public function __construct(
        private Request $request,
        private UrlManager $urlManager,
    )
    {}

    public function run(): void
    {
        $db = new Mysqli('localhost', 'root', '', 'specialist');

        $controllerInfo = $this->urlManager->parse();
        $controllerNameSpace = 'Controller\\' . $controllerInfo['controller'];
        $actionName = $controllerInfo['action'];
        $controller = new $controllerNameSpace();
        $controller->$actionName($this->request, $db);

        $db->close();
    }
}