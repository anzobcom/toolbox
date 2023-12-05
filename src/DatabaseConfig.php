<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp;

final readonly class DatabaseConfig
{
    public function __construct(
        private string $dbname,
        private string $username = 'root',
        private string $password = '',
        private string $host = 'localhost',
        private int $port = 3306,
        private string $charset = 'utf8mb4'
    ) {
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }
}
