<?php

namespace App;

class ConNguoi
{
    public static function getInfo()
    {
        var_dump(new self);
        echo "<br>";
        var_dump(new static);
    }
}
