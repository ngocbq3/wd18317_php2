<?php

//khai báo hằng
const HELLO = "Xin chào thế giới";
define("PI", 3.14);

echo HELLO . "<br>";
echo PI;


//Mảng tuần tự
$arr1 = array(1, 3, 43, 2, 3);
$arr2 = [3, 4, 5, 2, 4];

//Mảng liên hợp
$arrKey = [
    'mssv' => "PH12345",
    'hoten' => "Nguyễn Văn A",
    'ngaysinh' => "2003/12/2",
    'quequan' => "Hà Nội"
];
//Mảng 2 chiều
$sinhvien = [
    ["mssv" => "PH12345", "hoten" => "Nguyễn Văn A", "ngaysinh" => "2003/12/2", "quequan" => "Hà Nội"],
    ["mssv" => "PH12346", "hoten" => "Nguyễn Văn Đông", "ngaysinh" => "2004/9/22", "quequan" => "Nam Định"],
    ["mssv" => "PH12347", "hoten" => "Trần Đình Thi", "ngaysinh" => "2004/7/21", "quequan" => "Hà Nội"]
];
