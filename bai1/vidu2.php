<?php

//Vòng lặp for
for ($i = 1; $i <= 5; $i++) {
    echo "<h2>$i. Xin chào các bạn</h2>";
}

//Vòng lặp while
$dem = 1;
while ($dem <= 5) {
    echo "<h3>$dem. Vòng lặp while </h3>";
    $dem++;
}

//Vòng lặp do .. while
$dem = 1;
do {
    echo "<h3>$dem. Vòng lặp do .. while </h3>";
    $dem++;
} while ($dem <= 5);

require_once "vidu1.php";
//Vòng lặp foreach
echo "<br>";
foreach ($sinhvien as $key => $value) {
    echo "Sinh viên thứ $key <br>";
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    echo $value['mssv'] . " Họ tên: " . $value['hoten'];
    echo "<br>";
}
