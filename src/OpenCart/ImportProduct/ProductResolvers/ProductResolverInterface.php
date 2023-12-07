<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp\OpenCart\ImportProduct\ProductResolvers;

use Anzob\ToolboxApp\OpenCart\ImportProduct\ProductData;

interface ProductResolverInterface
{
    public function resolve(string $url): ?ProductData;

    public function matches(string $url): bool;
}
