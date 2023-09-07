<?php

namespace Src\Core\View;

use Src\Core\Debugger\Debug;
use Src\Core\Router\Route;

class View implements IView
{

    public function __construct(private readonly string $name, private ?array $vars = [])
    {

    }

    public function __toString(): string
    {

        ob_start();
        if ($this->vars) extract($this->vars);
        $site = Route::$routes[$this->name];
        include __DIR__ . "/../../../src/view/sites/{$site}.php";

        $view = ob_get_clean();

        if (isset($TEMPLATE)) {
            $CONTENT = $view;
            ob_start();
            include __DIR__ . "/../../../src/view/templates/{$TEMPLATE}.php";
            $view = ob_get_clean();
        }


        return $view;
    }
}