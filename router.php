<?php

$routes = require('routes.php');


function routeToController($route, $routes){
    if (array_key_exists($route, $routes)){
        require $routes[$route];
    }else{
        abort();
    }
}

function abort($code = 404){
    http_response_code($code);
    
    require "views/{$code}.php";
    
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);