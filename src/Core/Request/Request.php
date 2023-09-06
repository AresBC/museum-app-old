<?php declare(strict_types=1);

namespace Src\Core\Request;

use Exception;

class Request
{
    public readonly string $path;
    public readonly string $systemRoot;
    public readonly string $comspec;
    public readonly string $pathExtension;
    public readonly string $winDir;
    public readonly string $remoteAddress;
    public readonly string $documentRoot;
    public readonly string $requestScheme;
    public readonly string $contextPrefix;
    public readonly string $contextDocumentRoot;
    public readonly string $serverAdmin;
    public readonly string $scriptFileName;
    public readonly string $remotePort;
    public readonly string $gatewayInterface;
    public readonly string $requestMethod;
    public readonly string $queryString;
    public readonly string $fullRequestUri;
    public readonly string $scriptName;
    public readonly string $phpSelf;
    public readonly float $requestTimeFloat;
    public readonly int $requestTime;

    public readonly HttpMeta $httpMeta;
    public readonly ServerMeta $serverMeta;
    public readonly URI $requestUri;
    public readonly ?string $controller;
    public readonly ?string $action;
    public readonly ?array $params;

    /**
     * @throws Exception
     */
    function __construct($controller = null, $action = null, $params = null)
    {

        $this->path = $_SERVER['PATH'];
        $this->systemRoot = $_SERVER['SystemRoot'];
        $this->comspec = $_SERVER['COMSPEC'];
        $this->pathExtension = $_SERVER['PATHEXT'];
        $this->winDir = $_SERVER['WINDIR'];
        $this->remoteAddress = $_SERVER['REMOTE_ADDR'];
        $this->documentRoot = $_SERVER['DOCUMENT_ROOT'];
        $this->requestScheme = $_SERVER['REQUEST_SCHEME'];
        $this->contextPrefix = $_SERVER['CONTEXT_PREFIX'];
        $this->contextDocumentRoot = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
        $this->serverAdmin = $_SERVER['SERVER_ADMIN'];
        $this->scriptFileName = $_SERVER['SCRIPT_FILENAME'];
        $this->remotePort = $_SERVER['REMOTE_PORT'];
        $this->gatewayInterface = $_SERVER['GATEWAY_INTERFACE'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->queryString = $_SERVER['QUERY_STRING'];
        $this->fullRequestUri = $_SERVER['REQUEST_URI'];
        $this->scriptName = $_SERVER['SCRIPT_NAME'];
        $this->phpSelf = $_SERVER['PHP_SELF'];
        $this->requestTimeFloat = $_SERVER['REQUEST_TIME_FLOAT'];
        $this->requestTime = $_SERVER['REQUEST_TIME'];

        $this->httpMeta = new HttpMeta();
        $this->serverMeta = new ServerMeta();
        $this->requestUri = new URI($_SERVER['REQUEST_URI']);

        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }
}