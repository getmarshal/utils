<?php

declare(strict_types=1);

namespace Marshal\Utils;

final class Schema
{
    public const string PROPERTY_AUTO_ID = "schema::id";
    public const string PROPERTY_NAME = "schema::name";
    public const string PROPERTY_ALIAS = "schema::alias";
    public const string PROPERTY_DESCRIPTION = "schema::description";
    public const string PROPERTY_URL = "schema::url";
    public const string PROPERTY_IMAGE = "schema::image";
    public const string PROPERTY_CREATED_AT = "schema::created_at";
    public const string PROPERTY_UNIQUE_ALPHANUMERIC_TAG = "schema::unique_alphanumeric_tag";
    public const string PROPERTY_UPDATED_AT = "schema::updated_at";
    public const string THING = "schema::thing";

    public function __invoke(): array
    {
        return [
            "schema" => [
                "properties" => [
                    self::PROPERTY_AUTO_ID => $this->getPropertyId(),
                    self::PROPERTY_NAME => $this->getPropertyName(),
                    self::PROPERTY_ALIAS => $this->getPropertyAlias(),
                    self::PROPERTY_DESCRIPTION => $this->getPropertyDescription(),
                    self::PROPERTY_URL => $this->getPropertyUrl(),
                    self::PROPERTY_IMAGE => $this->getPropertyImage(),
                    self::PROPERTY_UNIQUE_ALPHANUMERIC_TAG => $this->getPropertyUniqueAlphaNumericTag(),
                    self::PROPERTY_CREATED_AT => $this->getPropertyCreatedAt(),
                    self::PROPERTY_UPDATED_AT => $this->getPropertyUpdatedAt(),
                ],
                "types" => [
                    self::THING => $this->getThingSchema(),
                ],
            ],
        ];
    }

    private function getPropertyId(): array
    {
        return [
            "autoincrement" => true,
            "description" => "Autoincrementing integer ID",
            "label" => "Auto ID",
            "name" => "id",
            "notnull" => true,
            "type" => "bigint",
        ];
    }

    private function getPropertyName(): array
    {
        return [
            "label" => "Name",
            "description" => "Entry name",
            "name" => "name",
            "notnull" => true,
            "type" => "string",
            "length" => 255,
        ];
    }

    private function getPropertyAlias(): array
    {
        return [
            "label" => "Alias",
            "description" => "Entry alternate name",
            "name" => "alias",
            "type" => "string",
            "length" => 255,
        ];
    }

    private function getPropertyImage(): array
    {
        return [
            "label" => "Image",
            "description" => "Entry featured image",
            "name" => "image",
            "type" => "string",
            "length" => 255,
        ];
    }

    private function getPropertyUrl(): array
    {
        return [
            "label" => "URL",
            "description" => "Entry url",
            "name" => "url",
            "type" => "string",
            "length" => 255,
        ];
    }

    private function getPropertyDescription(): array
    {
        return [
            "label" => "Description",
            "description" => "Entry brief description",
            "name" => "description",
            "type" => "text",
        ];
    }

    private function getPropertyCreatedAt(): array
    {
        return [
            "label" => "Created At",
            "description" => "Entry creation time",
            "name" => "created_at",
            "type" => "datetimetz_immutable",
            "notnull" => true,
            "index" => true,
        ];
    }
    private function getPropertyUniqueAlphaNumericTag(): array
    {
        return [
            "constraints" => [
                "unique" => true,
            ],
            "description" => "Entry unique alphanumeric identifier",
            "index" => true,
            "label" => "Unique Identifier",
            "length" => 255,
            "name" => "tag",
            "notnull" => true,
            "type" => "string",
        ];
    }

    private function getPropertyUpdatedAt(): array
    {
        return [
            "label" => "Updated At",
            "description" => "Entry last updated time",
            "name" => "updated_at",
            "type" => "datetimetz_immutable",
            "notnull" => true,
            "index" => true,
        ];
    }

    private function getThingSchema(): array
    {
        return [
            "name" => "Thing",
            "description" => "Generic database entry",
            "properties" => [
                self::PROPERTY_AUTO_ID,
                self::PROPERTY_NAME,
                self::PROPERTY_ALIAS,
                self::PROPERTY_DESCRIPTION,
                self::PROPERTY_URL,
                self::PROPERTY_IMAGE,
                self::PROPERTY_UNIQUE_ALPHANUMERIC_TAG,
                self::PROPERTY_CREATED_AT,
                self::PROPERTY_UPDATED_AT,
            ],
        ];
    }
}
