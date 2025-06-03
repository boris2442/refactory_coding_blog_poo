<?php

class Application
{
    public static function process()
    {
        $controllerName = "Article";   //controller que on veut appeler
        $task = "index"; //fonction que on veut appeler 

        if (!empty($_GET['controller'])) {
            $controllerName = ucfirst($_GET['controller']); //on met la premiere lettre en majuscule
        }

        if (!empty($_GET['task'])) {
            $task = $_GET['task']; //on recupere la tache
        }
        $controllerName = "\\Controllers\\" . $controllerName; //on ajoute le namespace
        $controller = new $controllerName();
        $controller->$task();
    }
}
