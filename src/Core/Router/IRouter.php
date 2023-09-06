<?php declare(strict_types=1);

namespace Src\Core\Router;


use Src\Core\Request\Request;

interface IRouter
{
    function route(): void;
}