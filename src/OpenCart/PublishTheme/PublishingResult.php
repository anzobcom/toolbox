<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\PublishTheme;

enum PublishingResult
{
    case FAILURE;
    case SUCCESS;

    public function getMessage(): string
    {
        return match ($this) {
            self::FAILURE => 'Failure',
            self::SUCCESS => 'Success',
        };
    }
}
