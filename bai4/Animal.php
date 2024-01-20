<?php

//Khai báo lớp
class Animal
{
    var $ten;
    var $tuoi;
    var $sochan;
    var $mausac;
    var $cannang;

    function tiengkeu()
    {
        echo $this->ten . " đang kêu";
    }

    function chay()
    {
        echo $this->ten . " đang chạy";
    }
}

//Khai báo đối tượng từ 1 lớp
$animal1 = new Animal();
$animal1->ten = "Con mèo";
$animal1->tuoi = 3;
$animal1->mausac = "Tam thể";
$animal1->cannang = 10;
echo "<pre>";
var_dump($animal1);
echo "</pre>";

//truy cập đến phương thức của đối tượng
$animal1->tiengkeu();
