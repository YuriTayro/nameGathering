<?php

namespace bng\System;
use bng\Controllers\Main;
use Exception;

 class Router {
    public static function dispatch(){
        // main route values
        $httpverb = $_SERVER['REQUEST_METHOD'];
        $controller = 'Main';
        $method = 'index';

        //check url parameters
        if(isset($_GET['ct'])){
            $controller = $_GET['ct'];
        }
        if(isset($_GET['mt'])){
            $method = $_GET['mt'];
        }

        // method parameters : são as variaveis q vamos passar para o interior dos metodos do controlador
        $parameters = $_GET;// aray associativo (chave/valor)
    
        // remove controller from parameters
        if(key_exists('ct', $parameters)){
            unset($parameters['ct']);
        }
        // remove method from parameters
        if(key_exists('mt', $parameters)){
            unset($parameters['mt']);
        }

        // tries to instanciate the controller and execute th method
        try{
            $class = "bng\Controllers\\".ucfirst($controller);
            $controller = new $class();
            $controller->$method(...$parameters);
        }catch(Exception $err){
            die($err->getMessage());
        }
    }
 }