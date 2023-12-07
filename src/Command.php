<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp;

use Symfony\Component\Console\Command\Command as CommandAlias;
use Symfony\Component\Console\Helper\QuestionHelper;

abstract class Command extends CommandAlias
{
    private const CUSTOM_REPLACEMENTS = [
        '~open-cart~' => 'opencart',
    ];

    private ?QuestionHelper $question_helper;

    public function __construct(
        QuestionHelper $question_helper = null
    ) {
        parent::__construct($this->resolveDefaultName());

        $this->question_helper = $question_helper;
    }

    public function getQuestionHelper(): QuestionHelper
    {
        if ($this->question_helper) {
            return $this->question_helper;
        }

        /** @var QuestionHelper $question_helper */
        $question_helper = $this->getHelper('question');

        return $question_helper;
    }

    private function resolveDefaultName(): string
    {
        $raw_name = $this->resolveRawName();

        $prepared_name = preg_replace(
            ['~\\\\~', '~([a-z])([A-Z])~'],
            [':', '$1-$2'],
            $raw_name
        );

        return preg_replace(
            array_keys(self::CUSTOM_REPLACEMENTS),
            array_values(self::CUSTOM_REPLACEMENTS),
            strtolower($prepared_name)
        );
    }

    private function resolveRawName(): string
    {
        $pattern = sprintf(
            '~^%s\\\\((?:\w+\\\\)+)?(\w+)Command$~',
            str_replace('\\', '\\\\', __NAMESPACE__)
        );

        preg_match($pattern, get_class($this), $matches);

        return trim($matches[1] ?: $matches[2], '\\');
    }
}
