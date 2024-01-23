<?php
require_once "./env.php";
require_once "./config.php";
require_once __DIR__ . "/vendor/autoload.php";

use App\Models\ProductModel;

// $data = ProductModel::where('name', 'LIKE', '%iphone%')
//     ->andWhere('price', '>=', 1000)
//     ->get();
// dd($data);

$data = [
    'name' => "Iphone 19",
    'price' => 2000,
    'detail' => "1 quả thận",
    'image' => 'iphone19.jpg'
];
$product = new ProductModel();
// var_dump($product->insert($data));
var_dump($product->update(7777, $data));
