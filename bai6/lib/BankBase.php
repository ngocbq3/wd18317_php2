<?php

namespace Lib;

class BankBase
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
}
