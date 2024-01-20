<?php
//Làm việc với CSDL
$host = "127.0.0.1"; //localhost
$dbname = "we3014.01";
$username = "root";
$password = "";

try {
    //chuỗi kết nối đến CSDL
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
}



//Thêm dữ liệu
//Sử dụng câu lệnh có tham số
$sql = "INSERT INTO products(name, image,cate_id, price) VALUES(:name, :image, :cate_id, :price)";

//Chuẩn bị
$stmt = $conn->prepare($sql);
//Dữ liệu insert đưa vào 1 mảng
$data = [
    "name" => "TEST",
    "image" => "noimage.jpg",
    "cate_id" => 16,
    "price" => 200
];
//Thực thi
$stmt->execute($data);

//Lấy dữ liệu
$sql = "SELECT * FROM products"; //SQL
$stmt = $conn->prepare($sql); //Sự chuẩn bị
$stmt->execute(); //Thực thi câu lệnh
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); //lấy dữ liệu
echo "<pre>";
print_r($result);
echo "</pre>";
