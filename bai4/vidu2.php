<?php

class Computer
{
    public $hang;
    public $ten;
    public $cannang;
    public $mausac;
    public $giaban;

    //Tạo phương thức khởi tạo construct
    public function __construct($hang, $ten, $cannang, $mausac, $giaban)
    {
        $this->hang = $hang;
        $this->ten = $ten;
        $this->cannang = $cannang;
        $this->mausac = $mausac;
        $this->giaban = $giaban;
    }

    public function mo()
    {
        echo "<p>$this->ten đang được mở</p>";
    }

    public function tat()
    {
        echo "<p>$this->ten gọi đến chương trình tắt máy</p>";
    }
}

//Tính kế thừa
class Asus extends Computer
{
    public $xuatxu;

    public function __construct($hang, $ten, $cannang, $mausac, $giaban, $xuatxu)
    {
        parent::__construct($hang, $ten, $cannang, $mausac, $giaban);
        $this->xuatxu = $xuatxu;
    }
    public function thongtin()
    {
        echo "Tên hãng: $this->hang<br>";
        echo "Tên máy: $this->ten<br>";
        echo "Giá bán: $this->giaban<br>";
    }
}

$computer1 = new Computer("DELL", "XPS 13", 1.1, "Xám không gian", 1900);
echo "<pre>";
var_dump($computer1);
echo "</pre>";

$tus = new Asus("Asus", "TUS", 1.8, "Màu đen đỏ", 1000, "Việt Nam");
echo "<pre>";
var_dump($tus);
echo "</pre>";
//Truy cập đến phương thức
$tus->thongtin();
