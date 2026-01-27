<?php

declare(strict_types=1);

namespace Marshal\Utils\Logger\Schema;

final class Logger
{
    public const string PROPERTY_CHANNEL = "marshal::log_channel";
    public const string PROPERTY_LEVEL = "marshal::log_level";
    public const string PROPERTY_MESSAGE = "marshal::log_message";
    public const string PROPERTY_CONTEXT = "marshal::log_context";
    public const string PROPERTY_EXTRA = "marshal::log_extra";
    public const string SCHEMA_NAME = "marshal::log";

    public function __invoke(): array
    {
        return [
            "schema" => [
                "properties" => [
                    self::PROPERTY_CHANNEL => [],
                    self::PROPERTY_LEVEL => [],
                    self::PROPERTY_MESSAGE => [],
                    self::PROPERTY_CONTEXT => [],
                    self::PROPERTY_EXTRA => [],
                ],
                "types" => [
                    self::SCHEMA_NAME => $this->getSchema(),
                ],
            ],
        ];
    }

    private function getSchema(): array
    {
        return [
            "name" => "",
            "description" => "",
            "meta" => [],
            "properties" => [
                self::PROPERTY_CHANNEL => [],
                self::PROPERTY_LEVEL => [],
                self::PROPERTY_MESSAGE => [],
                self::PROPERTY_CONTEXT => [],
                self::PROPERTY_EXTRA => [],
            ],
            "exclude_properties" => [
                "marshal::alias",
                "marshal::image",
                "marshal::name",
                "marshal::description",
            ],
        ];
    }
}
