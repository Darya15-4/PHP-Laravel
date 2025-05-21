<?php

spl_autoload_register(function(string $className){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require(dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php');
});

$route = $_GET['route'] ?? '';
$patterns = require('route.php');
$findRoute = false;

foreach ($patterns as $pattern => $controllerAndAction) {
    if (preg_match($pattern, $route, $matches)) {
        $findRoute = true;
        unset($matches[0]);
        [$controllerClass, $action] = $controllerAndAction;

        if (!class_exists($controllerClass)) {
            http_response_code(500);
            echo "Контроллер $controllerClass не найден";
            exit;
        }

        $controller = new $controllerClass;

        if (!method_exists($controller, $action)) {
            http_response_code(500);
            echo "Метод $action не найден в контроллере $controllerClass";
            exit;
        }

        $controller->$action(...$matches);
        break;
    }
}

if (!$findRoute) {
    http_response_code(404);
    echo 'Страница не найдена';
}
