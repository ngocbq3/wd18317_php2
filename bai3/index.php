<?php

require_once "models/db.php";
require_once "models/products.php";
require_once "controllers/controller.php";
require_once "controllers/productControllers.php";
require_once "controllers/homeController.php";

$ctl = $_GET['ctl'] ?? "";

switch ($ctl) {
    case "":
    case "home":
        homeIndex();
        break;
    case "contact":
        echo "<h1>Trang liên hệ</h1>";
        break;
    case "about":
        echo "<h1>Trang giới thiệu</h1>";
        break;
    case "product":
        productIndex();
        break;
    default:
        echo "<h1>404 FILE NOT FOUND</h1>";
}
