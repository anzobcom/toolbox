<?php

namespace Anzob\ToolboxApp\OpenCart\ImportProduct\ProductResolvers;

use Anzob\ToolboxApp\OpenCart\ImportProduct\ProductData;

class WildberriesProductResolver extends AbstractProductResolver
{

    public function resolve(string $url): ?ProductData
    {
        return null;
    }

    protected function getHost(): string
    {
        return 'wildberries.ru';
    }
}
