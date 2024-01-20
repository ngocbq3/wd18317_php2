<?php

interface BankInterface
{
    public function rutTien($sotien);
    public function chuyenTien($sotien, $nguoiNhan);
}
interface BankTest
{
    public function napTien($sotien);
}
class HKBank implements BankInterface, BankTest
{
    public $hoten;
    public $soTk;
    public $soDu;
    public function __construct($hoten, $soTk, $soDu)
    {
        $this->hoten = $hoten;
        $this->soTk = $soTk;
        $this->soDu = $soDu;
    }
    public function rutTien($sotien)
    {
        $this->soDu -= $sotien;
    }
    public function napTien($sotien)
    {
        $this->soDu += $sotien;
    }
    public function chuyenTien($sotien, $nguoiNhan)
    {
        if ($sotien < $this->soDu) {
            $this->soDu -= $sotien;
            $nguoiNhan->soDu += $sotien;
            echo "Ban đã chuyển số tiên $sotien đến tài khoản $nguoiNhan->soTk";
        } else {
            echo "Số tiền trong tài khoản không đủ";
        }
    }
}

$user1 = new HKBank("Nông Văn Dền", "0123123222", 10000000);
$user1->rutTien(1500000);
//Kiểm tra số dư
echo "$user1->hoten có số dư tài khoản là: $user1->soDu";
