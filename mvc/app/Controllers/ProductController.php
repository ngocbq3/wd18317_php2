<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $products = ProductModel::all();
        return $this->view(
            "admin/products/list",
            ["products" => $products]
        );
    }
}
