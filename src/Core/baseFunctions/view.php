<?php declare(strict_types=1);

function partial($name): void
{
    require __DIR__ . "/../../view/partials/{$name}.php";
}