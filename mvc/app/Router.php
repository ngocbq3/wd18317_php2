<?php

namespace App;

class Router
{
    protected static $routes = [];

    //method get: dùng để gọi đến đường dẫn $path theo phương thức GET
    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }
    //method post: dùng để gọi đến đường dẫn $path theo phương thức POST
    public static function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }
    //method getMethod để lấy REQUEST_METHOD trên server
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    //Method resolve: để giải quyết các đường dẫn được truyền vào $routes
    public function resolve()
    {
        $method = $this->getMethod();
        $path = str_replace(ROOT_URI, "/", $_SERVER['REQUEST_URI']);

        $callback = false;
        if (isset(static::$routes[$method][$path])) {
            $callback = static::$routes[$method][$path];
        }
        if ($callback === false) {
            echo "404 FILE NOT FOUND";
            die;
        }
        if (is_callable($callback)) {
            return $callback();
        }
    }
}
