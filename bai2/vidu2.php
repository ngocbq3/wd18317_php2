<?php

/**
 * 1. Anonymouse function
 * 2. IIFE
 * 3. Closure
 * 4. Callback
 */

//1. Anonymouse function
function () {
    echo "Xin chào";
};

//Gọi hàm
$name = "Nguyễn Nam";
call_user_func(function ($name) {
    echo "Xin chào: $name";
}, $name);

//2. IIFE
(function ($name) {
    echo "<h2>Xin chào: $name</h2>";
})("TungPH");

//3. Closure
$hello = function () {
    echo "Chào mừng các bạn đến với môn học PHP2";
};
//Gọi hàm
$hello();

//Callback
function showName($name, $callback)
{
    //getName($name)
    $callback($name);
}
//Xây dựng 1 hàm để gọi lại
function getName($name)
{
    echo "<br>Tên bạn: $name";
}
//Gọi hàm
showName("TungPH", 'getName');
