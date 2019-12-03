<?php


class Router
{

    private $routes;

    public function __construct(){
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }

    public function run(){
        $uri = $this->getURI();

        foreach($this->routes as $uriPattern => $path){
            if(preg_match("~$uriPattern~", $uri)){
                $segments = explode('/',$path); //Разбиваем строку разделителем '/'
                $controllerName = array_shift($segments).'Controller'; //Извлекаем первое значение из массива
                $controllerName = ucfirst($controllerName); //Первый знак в верхнем регистре

                $actionName = 'action'.ucfirst(array_shift($segments));

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php'; //Путь к файлу
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if($result !=null){
                    break;
                }
            }
        }

    }
}