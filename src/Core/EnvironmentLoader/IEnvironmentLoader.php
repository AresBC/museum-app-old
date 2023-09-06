<?php

namespace Src\Core\EnvironmentLoader;

interface IEnvironmentLoader
{
    function load(string $path): array;
}