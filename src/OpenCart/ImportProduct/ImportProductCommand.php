<?php

declare(strict_types=1);

namespace Anzob\ToolboxApp\OpenCart\ImportProduct;

use Anzob\ToolboxApp\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImportProductCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('OpenCart:import-product')
            ->setDescription('Imports product from third party website.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return self::SUCCESS;
    }
}
