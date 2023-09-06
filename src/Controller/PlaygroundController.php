<?php

namespace Src\Controller;

use JetBrains\PhpStorm\NoReturn;
use Src\Core\Debugger\Debug;
use Src\Core\Request\Request;
use Src\Core\Router\Route;
use Src\Core\View\View;

class PlaygroundController extends Controller
{
    // http://localhost/playground/route
    #[NoReturn] function route(Request $request): void
    {
        Debug::dd($request);
    }

    #[NoReturn] function phpInfo(): void
    {
        phpinfo();
        die;
    }

    #[NoReturn] function test(Request $request): View
    {
        return new View('home', $request->params);
    }
}