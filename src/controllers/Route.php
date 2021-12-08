<?php
//https://github.com/steampixel/simplePHPRouter
class Route
{

    private static $routes = array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    public static function add($expression, $function, $method = 'get')
    {
        array_push(self::$routes, array(
            'expression' => $expression,
            'function' => $function,
            'method' => $method
        ));
    }

    public static function pathNotFound($function)
    {
        self::$pathNotFound = $function;
    }

    public static function methodNotAllowed($function)
    {
        self::$methodNotAllowed = $function;
    }

    public static function run($basepath = '/')
    {
        // Parse current url
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri
        if (isset($parsed_url['path'])) {
            $path = $parsed_url['path'];
        } else {
            $path = '/';
        }
        // Get current request method
        $method = $_SERVER['REQUEST_METHOD'];

        $path_match_found = false;

        $route_match_found = false;

        foreach (self::$routes as $route) {
            if ($basepath != '' && $basepath != '/') {
                $route['expression'] = '(' . $basepath . ')' . $route['expression'];
            }

            $expr = $route['expression'];

            if ($expr == $path) {

                $path_match_found = true;

                if (strtolower($method) == strtolower($route['method'])) {
                    $route_match_found = true;

                    foreach ($route['function'] as $function) {
                        if (call_user_func_array($function, array([""])) == false) {
                            break;
                        }
                    }
                    break;
                }
            }

            if ($route_match_found == false) {

                if ($path_match_found) {
                    header("HTTP/1.0 405 Method Not Allowed");
                    if (self::$methodNotAllowed) {
                       echo "method not allowed";
                    }
                } else {
                    header("HTTP/1.0 404 Not Found");
                    if (self::$pathNotFound) {
                        echo "method not found";
                    }
                }

            }

        }
    }
}





