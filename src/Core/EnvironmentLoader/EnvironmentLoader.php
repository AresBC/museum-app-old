<?php

namespace Src\Core\EnvironmentLoader;

use ErrorException;
use Src\Core\EnvironmentLoader\IEnvironmentLoader;

class EnvironmentLoader implements IEnvironmentLoader
{

    /**
     * @throws ErrorException
     */
    function load(string $path): array
    {
        $path = realpath($path);


        $file = $this->readEnvironmentFile($path);


        while ($line = fgets($file)) {
            // Check if line is a comment
            $isComment = str_starts_with(trim($line), '#');

            if ($isComment || empty(trim($line))) continue;

            [$name, $value] = preg_split('/(\s?)=(\s?)/', $line);
            $name = trim($name);
            $value = isset($value) ? trim($value) : '';

            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
        }

        fclose($file);


        return $_ENV;
    }

    /**
     * @throws ErrorException
     */
    private function readEnvironmentFile(bool|string $path)
    {
        if (!is_file($path)) {
            throw new ErrorException('Environment file is missing.');
        }

        if (!is_readable($path)) {
            throw new ErrorException("Read permission denied: \"{$path}\".");
        }

        if (!is_writable($path)) {
            throw new ErrorException("Write permission denied: \"{$path}\".");
        }

        $file = fopen($path, 'r');
        if (false === $file) {
            throw new ErrorException('Environment file could not be opened.');
        }


        return $file;
    }
}