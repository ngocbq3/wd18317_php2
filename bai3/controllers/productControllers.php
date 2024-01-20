<?php

//Trang hiển thị danh sách sản phẩm
function productIndex()
{
    $products = listProductAll();

    view("product/product", ["products" => $products]);
}
