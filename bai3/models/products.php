<?php

function listProductAll()
{
    $conn = connection();
    //Lấy dữ liệu
    $sql = "SELECT * FROM products"; //SQL
    $stmt = $conn->prepare($sql); //Sự chuẩn bị
    $stmt->execute(); //Thực thi câu lệnh
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //lấy dữ liệu
    return $result;
}
