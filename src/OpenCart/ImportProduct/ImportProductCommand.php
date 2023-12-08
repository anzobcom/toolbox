<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\ImportProduct;

use Anzob\Toolbox\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImportProductCommand extends Command
{
    protected function configure(): void
    {
        $this->setDescription('Imports product from third party website.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return self::SUCCESS;
    }
}
