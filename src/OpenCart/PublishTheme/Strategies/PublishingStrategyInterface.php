<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp\OpenCart\PublishTheme\Strategies;

use Anzob\ToolboxApp\OpenCart\PublishTheme\PublishingResult;

interface PublishingStrategyInterface
{
    public function publish(string $name, string $project_dir, string $theme_dir): PublishingResult;
}
