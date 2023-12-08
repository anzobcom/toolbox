<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\PublishTheme\Strategies;

use Anzob\Toolbox\OpenCart\PublishTheme\PublishingResult;

final class OpenCartV4PublishingStrategy implements PublishingStrategyInterface
{
    public function publish(string $name, string $project_dir, string $theme_dir): PublishingResult
    {
        return PublishingResult::SUCCESS;
    }
}
