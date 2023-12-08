<?php

declare(strict_types=1);

namespace Anzob\Toolbox;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class PingCommand extends Command
{
    protected function configure(): void
    {
        $this->setDescription('The ping-pong command');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('pong');

        return self::SUCCESS;
    }
}
