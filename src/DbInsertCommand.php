<?php

namespace Anzob\ToolboxApp;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DbInsertCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('db-insert')
            ->setDescription('Checks the toolbox app.')
            ->setHelp('This command allows you to check if toolbox app is working or not.');
//            ->addArgument('database', InputArgument::REQUIRED)
//            ->addArgument('table', InputArgument::REQUIRED)
//            ->addArgument('username')
//            ->addArgument('password');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config['database'] = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'flamingo',
            'charset' => 'utf8mb4'
        ];

        $database = new Database($config['database']);

        return Command::SUCCESS;
    }
}