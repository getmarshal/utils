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
            Schema::class,
        ]);

        return $config->getMergedConfig();
    }

    private function getDependencies(): array
    {
        return [
            "delegators" => [
                Logger\Handler\DatabaseHandler::class => [
                    Database\DatabaseAwareDelegatorFactory::class,
                ],
            ],
            "factories" => [
                FileSystem\Local\FileManager::class                     => FileSystem\Local\FileManagerFactory::class,
                Logger\Handler\DatabaseHandler::class                   => Logger\Handler\DatabaseHandlerFactory::class,
            ],
        ];
    }

    private function getSchemaProperties(): array
    {
        return [
            "marshal::event_channel" => [
                "label" => "Log Channel",
                "description" => "Log channel",
                "name" => "channel",
                "notnull" => true,
                "type" => \Doctrine\DBAL\Types\Types::STRING,
                "index" => true,
                "length" => 255,
            ],
            "marshal::log_context" => [
                "label" => "Context",
                "description" => "Log message context data",
                "name" => "context",
                "type" => \Doctrine\DBAL\Types\Types::JSON,
                "platformOptions" => [
                    "jsonb" => true,
                ],
            ],
            "marshal::log_extra" => [
                "label" => "Extra",
                "description" => "Log extra details",
                "name" => "extra",
                "type" => \Doctrine\DBAL\Types\Types::JSON,
                "platformOptions" => [
                    "jsonb" => true,
                ],
            ],
            "marshal::log_channel" => [
                "label" => "Log Channel",
                "description" => "String indicating log channel",
                "name" => "level",
                "index" => true,
                "notnull" => true,
                "type" => \Doctrine\DBAL\Types\Types::STRING,
                "length" => 255,
            ],
            "marshal::log_level" => [
                "label" => "Log Level",
                "description" => "String indicating log level",
                "name" => "level",
                "index" => true,
                "notnull" => true,
                "type" => \Doctrine\DBAL\Types\Types::STRING,
                "length" => 255,
            ],
            "marshal::log_message" => [
                "label" => "Log Message",
                "description" => "Log message",
                "name" => "message",
                "notnull" => true,
                "type" => \Doctrine\DBAL\Types\Types::TEXT,
            ],
        ];
    }
}
