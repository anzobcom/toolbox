<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\ImportProduct\ProductResolvers;

use Anzob\Toolbox\OpenCart\ImportProduct\ProductData;

interface ProductResolverInterface
{
    public function resolve(string $url): ?ProductData;

    public function matches(string $url): bool;
}
