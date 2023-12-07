<?php

namespace Anzob\ToolboxApp\OpenCart\ImportProduct\ProductResolvers;

use Anzob\ToolboxApp\OpenCart\ImportProduct\ProductData;

class OzonProductResolver extends AbstractProductResolver
{

    public function resolve(string $url): ?ProductData
    {
        return null;
    }

    protected function getHost(): string
    {
        return 'ozon.ru';
    }
}
