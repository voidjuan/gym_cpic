<?php

require_once '../app/config/global.php';
require_once '../app/controllers/homeController.php';
require_once '../app/controllers/rolController.php';
require_once '../app/controllers/centroController.php';
require_once '../app/controllers/actividadController.php';
require_once '../app/controllers/programaController.php';


$url = $_SERVER['REQUEST_URI']; // Lo que se ingresa en la url

$routes = include_once '../app/config/routes.php';

$matchedRoute = null;
foreach ($routes as $route => $routeConfig) {
    if (preg_match("#^$route$#", $url, $matches)) {
        $matchedRoute = $routeConfig;
        break;
    }
}

if ($matchedRoute) {
    $controllerName = $matchedRoute['controller'];
    $actionName = $matchedRoute['action'];
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        // Obtener parametros por URL
        $parameters = array_slice($matches, 1);
        // echo "Array Matches:";
        // print_r($matches);
        // echo "Parametros:";
        // print_r($parameters);
        $controller = new $controllerName();
        $controller->$actionName(...$parameters);
        exit;
    }
}

// if (array_key_exists($url, $routes)) {
//     // $controller = new HomeController();
//     // $controller->saludar();
//     $controllerName = $routes[$url]['controller'];
//     $actionName = $routes[$url]['action'];

//     $controller = new $controllerName(); // App\Controllers\HomeController
//     $controller->$actionName(); // index
// } else {
//     http_response_code(404);
//     echo "<br>Page Not Found";
//     exit();
// }
