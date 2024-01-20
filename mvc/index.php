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
    'price' => 3000,
    'detail' => "2 quả thận"
];
$product = new ProductModel();
var_dump($product->insert($data));
