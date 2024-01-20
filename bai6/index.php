<?php
require_once "./lib/BankBase.php";
require_once "./app/HDBank.php";
require_once "./app/ConNguoi.php";
require_once "./app/NguoiLon.php";
//Áp dụng
use App\HDBank;
use App\NguoiLon;

$bank = new HDBank("Nguyễn Văn Long", '0989899123', 2000000);
$bank->rutTien(100000);
echo "Số dư tài khoản là: " . $bank->soDu;
echo "<br />";
//Gọi trực tiếp phương thức static
NguoiLon::getInfo();
