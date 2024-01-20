<?php

class Animal
{
    public $ten;
    public $mau;
    public function __construct($ten, $mau)
    {
        $this->ten = $ten;
        $this->mau = $mau;
    }

    public function tiengKeu()
    {
        echo "$this->ten đang kêu";
    }
}
//Tính đa hình
class Dog extends Animal
{
    public function tiengKeu()
    {
        echo "$this->ten đang kêu gâu gâu ...";
    }
}
class Cat extends Animal
{
    public function tiengKeu()
    {
        echo "$this->ten đang kêu meo meo ...";
    }
}

$dog = new Dog("Cậu vàng", "Vàng");
$cat = new Cat("Mèo Tôm", "Xám");

$dog->tiengKeu();
echo "<br />";
$cat->tiengKeu();
