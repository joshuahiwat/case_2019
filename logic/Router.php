<?php
namespace logic;

final class Router {

    private static $routes = [];

    private function __construct() {}
    private function __clone() {}

    /**
     * @param string $pattern
     * @param string $callback
     * @return void
     */
    public static function route(string $pattern, string $callback)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    /**
     * @param string $url
     * @return mixed
     */
    public static function execute(string $url)
    {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params, PREG_OFFSET_CAPTURE)) {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }
}