<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\PublishTheme;

use Anzob\Toolbox\Command;
use Anzob\Toolbox\OpenCart\PublishTheme\Strategies\OpenCartV3PublishingStrategy;
use Anzob\Toolbox\OpenCart\PublishTheme\Strategies\OpenCartV4PublishingStrategy;
use Anzob\Toolbox\OpenCart\PublishTheme\Strategies\PublishingStrategyInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

final class PublishThemeCommand extends Command
{
    private const OPENCART_VERSION_3 = '3';
    private const OPENCART_VERSION_4 = '4';

    protected function configure(): void
    {
        $this
            ->setDescription('Publishes a new theme for OpenCart')
            ->setHelp(
                'Given version, name, OpenCart installed location and theme location, publishes all necessary theme files.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $opencart_version = $this->getQuestionHelper()->ask(
            $input,
            $output,
            new ChoiceQuestion(
                'OpenCart version: ',
                [self::OPENCART_VERSION_3, self::OPENCART_VERSION_4],
                self::OPENCART_VERSION_3
            )
        );

        $strategy = $this->resolveStrategy($opencart_version);

        $theme_name = $this->getQuestionHelper()->ask(
            $input,
            $output,
            new Question('Name: ')
        );

        $project_dir = $this->getQuestionHelper()->ask(
            $input,
            $output,
            new Question('Project root directory: ')
        );

        $theme_dir = $this->getQuestionHelper()->ask(
            $input,
            $output,
            new Question('Theme root directory: ')
        );

        $publishing_result = $strategy->publish($theme_name, $project_dir, $theme_dir);

        if ($publishing_result !== PublishingResult::SUCCESS) {
            $output->writeln($publishing_result->getMessage());

            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    private function resolveStrategy(string $version): PublishingStrategyInterface
    {
        return match ($version) {
            self::OPENCART_VERSION_3 => new OpenCartV3PublishingStrategy(),
            self::OPENCART_VERSION_4 => new OpenCartV4PublishingStrategy(),
        };
    }
}
