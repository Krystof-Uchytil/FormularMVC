<?php

class Router {
    public static function route($url) {
        $controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'form';
        $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

        $controllerClass = ucfirst($controllerName) . 'Controller';
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $actionName)) {
                $controller->{$actionName}();
            } else {
                die("Akce '$actionName' v kontroleru '$controllerClass' neexistuje.");
            }
        } else {
            die("Kontroler '$controllerClass' neexistuje.");
        }
    }
}