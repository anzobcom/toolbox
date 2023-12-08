<?php

declare(strict_types=1);

namespace Anzob\Toolbox\Other\ProductImport;

use Anzob\Toolbox\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ProductsImportCommand extends Command
{
    private const ENGLISH_LANGUAGE = 1;
    private const ENG_DESC_COL = 11;
    private const RUSSIAN_LANGUAGE = 2;
    private const RU_DESC_COL = 12;

    protected function configure(): void
    {
        $this
            ->setDescription('Import products.')
            ->setHelp('This command allows you to import products.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = new DatabaseConfig('flamingo');
        $database = new Database($config);

        $csvFile = file('parex-product-list.csv');
        $data = [];

        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line);
        }

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i][self::RU_DESC_COL] !== '') {
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
                        'language_id' => self::RUSSIAN_LANGUAGE,
                        'name' => $data[$i][self::RU_DESC_COL],
                        'description' => $data[$i][self::RU_DESC_COL],
                        'meta_title' => $data[$i][self::RU_DESC_COL],
                    ]
                );
            }
        }

        return self::SUCCESS;
    }
}
