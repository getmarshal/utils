<?php

declare(strict_types=1);

namespace Marshal\Utils;

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;

class ConfigProvider
{
    public function __invoke(): array
    {
        $config = new ConfigAggregator([
            new ArrayProvider([
                "dependencies" => $this->getDependencies(),
            ]),
        ]);

        return $config->getMergedConfig();
    }

    private function getDependencies(): array
    {
        return [
            "factories" => [
                FileSystem\Local\FileManager::class                     => FileSystem\Local\FileManagerFactory::class,
            ],
        ];
    }
}
