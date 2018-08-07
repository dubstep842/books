<?php

error_reporting(E_ALL);
class Router {
    

    public function run(){
        
        $controllerName = isset($_GET['controller']) ? ucfirst(trim(strip_tags($_GET['controller']))) : 'Index';
        $actionName = isset($_GET['action']) ? trim(strip_tags($_GET['action'])) : 'Index';
     
        $controllerName = $controllerName.'Controller';       
        $actionName = 'action'.$actionName;
        
        $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                
        if (!file_exists($controllerFile)){self::ErrorPage404();}
        include_once($controllerFile);
        $controllerObject = new $controllerName;
        if (!method_exists($controllerObject, $actionName)){self::ErrorPage404();}
        $controllerObject->$actionName();
            

                
    }
    
    public static function ErrorPage404() {
        include_once('views/layout/404.php');   
            //echo 'Страница не найдена 404!';
            exit();
    }
}
























