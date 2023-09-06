<?php declare(strict_types=1);

namespace Src\Core\Debugger;


interface IDebug
{
    static function dump(mixed ...$items): void;
    static function dd(mixed ...$items): void;
}