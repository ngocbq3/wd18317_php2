<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    //Danh sách
    public function index()
    {
        $products = ProductModel::all();
        //lấy thông báo
        $message = $_COOKIE['message'] ?? "";
        return $this->view(
            "admin/products/list",
            ["products" => $products, 'message' => $message]
        );
    }

    //Form add
    public function create()
    {
        $categories = CategoryModel::all();
        $this->view(
            "admin/products/add",
            ['categories' => $categories]
        );
    }
    //Thêm mới lên database từ form add
    public function store()
    {
        $data = $_POST;
        //Lưu ảnh
        $file = $_FILES['image'];
        $image = $file['name']; //Lấy tên file
        //upload
        move_uploaded_file($file['tmp_name'], "images/" . $image);
        //add file vào data
        $data['image'] = $image;

        $product = new ProductModel;
        $product->insert($data);
        header("location: " . ROOT_PATH . "product/list");
        die;
    }
    //Hiển thị Form sửa sản phẩm
    public function edit()
    {
        $id = $_GET['id'];
        $product = ProductModel::find($id);
        $categories = CategoryModel::all();
        return $this->view(
            "admin/products/edit",
            ['product' => $product, 'categories' => $categories]
        );
    }
    //Cập nhật dữ liệu Form Edit vào database
    public function update()
    {
        $data = $_POST;

        $file = $_FILES['image'];
        //Kiểm tra xem người dùng có sửa ảnh không
        if ($file['size'] > 0) {
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/" . $image);
            $data['image'] = $image;
        }

        //Cập nhật
        $product = new ProductModel();
        $product->update($data['id'], $data);
        //Quay lại trang edit
        header("location: " . ROOT_PATH . "product/edit?id=" . $data['id']);
        die;
    }
    //Xóa sản phẩm
    public function delete()
    {
        $id = $_GET['id'];
        ProductModel::delete($id);
        setcookie("message", "Xóa dữ liệu thành công", time() + 1);
        redirect("product/list");
    }
}
