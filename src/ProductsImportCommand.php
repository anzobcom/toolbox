<?php

namespace Anzob\ToolboxApp;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductsImportCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('db-insert')
            ->setDescription('Import products.')
            ->setHelp('This command allows you to import products.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $english_language = 1;
        $eng_desc_col = 11;
        $russian_language = 2;
        $ru_desc_col = 12;

        $config = new DatabaseConfig('flamingo');
        $database = new Database($config);

        $csvFile = file('parex-product-list.csv');
        $data = [];

        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }

        for($i = 0; $i < count($data); $i++) {
            if ($data[$i][$ru_desc_col] !== '') {
                $database->query(
                    'INSERT INTO oc_product_description (
                            language_id, 
                            name, 
                            description, 
                            meta_title) 
                    VALUES (
                            :language_id, 
                            :name, 
                            :description, 
                            :meta_title
                    )',
                    [
                        'language_id' => $russian_language,
                        'name' => $data[$i][$ru_desc_col],
                        'description' => $data[$i][$ru_desc_col],
                        'meta_title' => $data[$i][$ru_desc_col]
                    ]
                );
            }
        }

        return Command::SUCCESS;
    }
}
