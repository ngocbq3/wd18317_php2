<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;
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
Router::get("/home", [HomeController::class, 'index']);
Router::get("/detail", [HomeController::class, 'detail']);
Router::get("/product/list", [ProductController::class, 'index']);
Router::get("/product/list", [ProductController::class, 'index']);
Router::get("/product/create", [ProductController::class, 'create']);
Router::post("/product/create", [ProductController::class, 'store']);
Router::get("/product/edit", [ProductController::class, 'edit']);
Router::post("/product/edit", [ProductController::class, 'update']);
//xóa sản phẩm
Router::get("/product/delete", [ProductController::class, 'delete']);

$router->resolve();
