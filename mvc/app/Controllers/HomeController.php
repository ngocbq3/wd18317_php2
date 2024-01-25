<?php

namespace App\Controllers;

use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function index()
    {
        $products = ProductModel::all();
        return $this->view(
            "clients/home",
            ['products' => $products]
        );
    }
    public function detail()
    {
        $id = $_GET['id'];
        $product = ProductModel::find($id);
        dd($product);
    }
}
