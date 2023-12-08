<?php

namespace Anzob\Toolbox\OpenCart\ImportProduct\ProductResolvers;

use Anzob\Toolbox\OpenCart\ImportProduct\ProductData;

final class OzonProductResolver extends AbstractProductResolver
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
