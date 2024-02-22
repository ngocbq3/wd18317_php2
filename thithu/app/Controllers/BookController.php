<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class BookController extends BaseController implements InterfaceController
{
    public function index()
    {

        $books = BookModel::all();
        return $this->view(
            "list",
            ["books" => $books]
        );
    }

    public function create()
    {
        $loaisach = CategoryModel::all();
        return $this->view(
            "add",
            ['loaisach' => $loaisach]
        );
    }

    public function store()
    {
        $data = $_POST;
        //lấy file
        $file = $_FILES['anh'];
        //Biến chứa lỗi validate
        $errors = [];
        if ($file['size'] == 0) {
            $errors['anh'] = "Bạn chưa nhập file";
        } else {
            $imgs = ['jpg', 'png'];
            //lấy tên file
            $anh = $file['name'];
            //tên ra tên mở rộng của file
            $file_ext = pathinfo($anh, PATHINFO_EXTENSION);
            //kiểm tra xem $file_ext có nằm trong $imgs không?
            if (in_array($file_ext, $imgs) == false) {
                $errors['anh'] = "bản phải nhập file ảnh jpg, png";
            }
        }

        if ($errors) {
            $loaisach = CategoryModel::all();
            return $this->view(
                "add",
                [
                    'loaisach' => $loaisach,
                    'errors' => $errors,
                    'data' => $data
                ]
            );
        }
        //Thêm ảnh và upload file
        move_uploaded_file($file['tmp_name'], "images/" . $anh);
        //Thêm ảnh vào mảng data
        $data['anh'] = $anh;
        BookModel::insert($data);
        header("location: " . ROOT_PATH);
        die;
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            BookModel::delete($id);
        }
        header("location: " . ROOT_PATH);
        die;
    }
    public function edit()
    {
    }
    public function update()
    {
    }
}
