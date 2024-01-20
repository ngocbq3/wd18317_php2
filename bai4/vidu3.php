<?php

class People
{
    private $ngaysinh;
    public $hoten;
    protected $kethon;

    public function __construct($hoten)
    {
        $this->hoten = $hoten;
    }
    public function setNgaySinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }
    public function setKetHon($kethon)
    {
        $this->kethon = $kethon;
    }
}

class Student extends People
{
    public function getNgaySinh()
    {
        echo "Ngày sinh: " . $this->ngaysinh;
    }

    public function getKetHon()
    {
        echo "Tình trạng kết hôn: " . $this->kethon;
    }
}

$people = new People("Nguyễn Nam");
$people->setNgaySinh("2000/12/12");
$people->setKetHon("Chưa kết hôn");

echo "Ngày sinh: " . $people->hoten;

$student = new Student("Trần Văn Hưng");
// $student->getNgaySinh();
echo "<br />";
$student->setKetHon("Đã kết hôn");
$student->getKetHon();
