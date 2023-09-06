<?php

namespace Src\Core\View;

use Src\Core\Debugger\Debug;

class View implements IView
{

    public function __construct(private readonly string $name, private array $vars)
    {

    }

    public function __toString(): string
    {

        ob_start();
        extract($this->vars);
        include __DIR__ . "/../../../src/view/sites/{$this->name}.php";

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