<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PingCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('ping')
            ->setDescription('Checks the toolbox app.')
            ->setHelp('This command allows you to check if toolbox app is working or not.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('pong');

        return Command::SUCCESS;
    }
}
