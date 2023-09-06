<?php declare(strict_types=1);


require_once('vendor/autoload.php');


use Src\Core\EnvironmentLoader\EnvironmentLoader;
use Src\Core\Request\Request;
use Src\Core\Router\Router;


(new EnvironmentLoader())->load(__DIR__ . '/.env');


$router = new Router();
//try {
    $router->route();
//} catch (Exception $exception) {
//    include __DIR__ . '/src/view/sites/404.php';
//}
