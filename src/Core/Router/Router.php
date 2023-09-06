<?php declare(strict_types=1);

namespace Src\Core\Router;

use Exception;
use Src\Core\Debugger\Debug;
use Src\Core\Request\Request;
use Src\Core\Request\URI;
use Src\Core\View\View;

class Router implements IRouter
{

    /**
     * @throws Exception
     */
    public final function route(): void
    {
        $request = $this->createRequest();

        require_once __DIR__ . '/../../../routes.php';

        $path = $request->requestUri->path;
        $path = substr($path, 1);

        if (array_key_exists($path, Route::$routes)) {
            echo (new View($path, $request->params));
            die;
        }

        $controllerName = 'Src\Controller\\' . $request->controller . 'Controller';
        if (null === $request->action) {
            throw new Exception('Action is missing.');
        }
        $action = $request->action;
        $actionElements = explode('-', $action);
        $actionElements = array_reverse($actionElements);
        $action = array_reduce($actionElements, function ($ele, $acc) {
            return $acc . ucfirst($ele);
        }, '');

        $view = (new $controllerName)->$action($request);

        echo $view ?? '';
    }

    /**
     * @throws Exception
     */
    private function createRequest(): Request
    {
        $requestUri = new URI($_SERVER['REQUEST_URI']);

        $pathElements = $requestUri->pathElements;

        $controller = array_shift($pathElements);
        $action = array_shift($pathElements);
        $params = [];

        for ($i = 0; $i < count($pathElements);) {
            $params[$pathElements[$i++]] = $pathElements[$i++] ?? null;
        }

        if (null !== $requestUri->queryElements)  {
            $params = array_merge($params, $requestUri->queryElements);
        }


        return new Request($controller, $action, $params);
    }
}