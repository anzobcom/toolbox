<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\PublishTheme\Strategies;

use Anzob\Toolbox\OpenCart\PublishTheme\PublishingResult;

interface PublishingStrategyInterface
{
    public function publish(string $name, string $project_dir, string $theme_dir): PublishingResult;
}
