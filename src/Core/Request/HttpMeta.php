<?php declare(strict_types=1);

namespace Src\Core\Request;

class HttpMeta
{
    public readonly string $host;
    public readonly string $connection;
    public readonly ?string $cacheControl;
    public readonly string $secChUa;
    public readonly string $secChUaMobile;
    public readonly string $secChUaPlatform;
    public readonly string $userAgent;
    public readonly string $upgradeInsecureRequests;
    public readonly string $accept;
    public readonly string $secFetchSite;
    public readonly string $secFetchMode;
    public readonly string $secFetchUser;
    public readonly string $secFetchDest;
    public readonly string $acceptEndcoding;
    public readonly string $acceptLanguage;
    function __construct() {
        $this->host = $_SERVER['HTTP_HOST'];
        $this->connection = $_SERVER['HTTP_CONNECTION'];
        $this->cacheControl = $_SERVER['HTTP_CACHE_CONTROL'] ?? null;
        $this->secChUa = $_SERVER['HTTP_SEC_CH_UA'];
        $this->secChUaMobile = $_SERVER['HTTP_SEC_CH_UA_MOBILE'];
        $this->secChUaPlatform = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];
        $this->upgradeInsecureRequests = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'];
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $this->accept = $_SERVER['HTTP_ACCEPT'];
        $this->secFetchSite = $_SERVER['HTTP_SEC_FETCH_SITE'];
        $this->secFetchMode = $_SERVER['HTTP_SEC_FETCH_MODE'];
        $this->secFetchUser = $_SERVER['HTTP_SEC_FETCH_USER'];
        $this->secFetchDest = $_SERVER['HTTP_SEC_FETCH_DEST'];
        $this->acceptEndcoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
        $this->acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }
}