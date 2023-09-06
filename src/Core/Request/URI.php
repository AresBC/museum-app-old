<?php declare(strict_types=1);

namespace Src\Core\Request;

use Exception;

class URI
{
    public readonly ?string $path;
    public readonly ?string $query;
    public readonly ?string $fragment;
    public readonly ?array $pathElements;
    public readonly ?array $queryElements;

    /**
     * @throws Exception
     */
    function __construct($uri)
    {
        $uriItems = parse_url($uri);
        if ($uriItems === false) {
            throw new Exception('URI is invalid.');
        }

        $this->path = $uriItems['path'] ?? null;
        $this->query = $uriItems['query'] ?? null;
        $this->fragment = $uriItems['fragment'] ?? null;

        $pathElements = explode('/', $this->path);
        array_shift($pathElements);
        $this->pathElements = count($pathElements) === 1 && $pathElements[0] === '' ? null : $pathElements;

        $queryElements = [];
        if ($this->query) {
            $queryElementStrings = explode('&', $this->query);
            foreach ($queryElementStrings as $elementString) {
                [$key, $value] = explode('=', $elementString);
                $queryElements[$key] = $value;
            }
        }
        $this->queryElements = empty($queryElements) ? null : $queryElements;
    }
}