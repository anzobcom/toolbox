<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp\OpenCart\ImportProduct\ProductResolvers;

abstract class AbstractProductResolver implements ProductResolverInterface
{
    public function matches(string $url): bool
    {
        return $this->getHost() === parse_url($url, PHP_URL_HOST);
    }

    protected abstract function getHost(): string;
}
