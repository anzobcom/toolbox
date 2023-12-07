<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp\Other\ProductImport;

use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;
    public PDOStatement|bool $statement;

    public function __construct(DatabaseConfig $config)
    {
        $dsn = 'mysql:host=' . $config->getHost()
            . ';port=' . $config->getPort()
            . ';dbname=' . $config->getDbname()
            . ';charset=' . $config->getCharset();

        $this->connection = new PDO($dsn, $config->getUsername(), $config->getPassword(), [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = []): self
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get(): false|array
    {
        return $this->statement->fetchAll();
    }
}
