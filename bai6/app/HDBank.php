<?php

namespace App;

use Lib\BankBase;

class HDBank extends BankBase
{
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
