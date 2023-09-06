<?php declare(strict_types=1);

namespace Src\Core\Request;

class ServerMeta
{
    public readonly string $signature;
    public readonly string $software;
    public readonly string $name;
    public readonly string $address;
    public readonly string $port;
    public readonly string $admin;
    public readonly string $protocol;

    function __construct()
    {
        $this->signature = $_SERVER['SERVER_SIGNATURE'];
        $this->software = $_SERVER['SERVER_SOFTWARE'];
        $this->name = $_SERVER['SERVER_NAME'];
        $this->address = $_SERVER['SERVER_ADDR'];
        $this->port = $_SERVER['SERVER_PORT'];
        $this->admin = $_SERVER['SERVER_ADMIN'];
        $this->protocol = $_SERVER['SERVER_PROTOCOL'];
    }
}