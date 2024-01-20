<?php

/**
 * $path chính là đường dẫn đến pageview
 * $data: dữ liệu được lấy từ model
 */
function view($path, $data = [])
{
    extract($data);
    include_once "views/$path.php";
}
