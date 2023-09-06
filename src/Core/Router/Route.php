<?php declare(strict_types=1);

namespace Src\Core\Router;

use Src\Core\Debugger\Debug;
use Src\Core\Request\Request;

class Route implements IRoute
{
    static array $routes = [];
    static function view($path, $view) {
        Route::$routes[$path] = $view;
    }
    static function get() {

    }
    static function post() {

    }
    static function put() {

    }
    static function delete() {

    }
    static function head() {

    }
    static function connect() {

    }
    static function options() {

    }
    static function trace() {

    }
    static function patch() {

    }
}