<?php

abstract class BankAbstract
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

    public abstract function chuyentien($sotien, $nguoinhan);
}

//Tính trừu tượng
class HDBank extends BankAbstract
{
    public function chuyentien($sotien, $nguoinhan)
    {
        if ($sotien < $this->soDu) {
            $this->soDu -= $sotien;
            $nguoinhan->soDu += $sotien;
            echo "Ban đã chuyển số tiên $sotien đến tài khoản $nguoinhan->soTk";
        } else {
            echo "Số tiền trong tài khoản không đủ";
        }
    }
}
//Sử dụng
$user1 = new HDBank("Nguyễn Văn An", "0123123123", 2000000);
$user2 = new HDBank("Nông Văn Dền", "0123123124", 0);

//Chuyển tiền từ user1->user2
$user1->chuyentien(500000, $user2);

//Kiểm tra so dư của user1
echo "<br>$user1->hoten có số dư tài khoản là: $user1->soDu";
