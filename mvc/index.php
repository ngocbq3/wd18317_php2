<?php

use App\Router;

require_once "./env.php";
require_once "./config.php";
require_once __DIR__ . "/vendor/autoload.php";

$router = new Router();

Router::get("/", function () {
    echo "HOME";
});
Router::get('/about', function () {
    echo "PAGE ABOUT";
});
Router::get("/product/list", function () {
    echo "Page PRODUCT LIST";
});

$router->resolve();
