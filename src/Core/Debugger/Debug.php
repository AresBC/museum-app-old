<?php declare(strict_types=1);

namespace Src\Core\Debugger;


use JetBrains\PhpStorm\NoReturn;

class Debug implements IDebug
{
    static function dump(mixed ...$items): void
    {
        echo '<pre>';
        print_r($items);
        echo '</pre>';
    }

    #[NoReturn] static function dd(mixed ...$items): void
    {
        Debug::dump(...$items);
        die;
    }
}