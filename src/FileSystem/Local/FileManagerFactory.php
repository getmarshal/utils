<?php

declare(strict_types=1);

namespace Marshal\Utils\FileSystem\Local;

use Psr\Container\ContainerInterface;

final class FileManagerFactory
{
    public function __invoke(ContainerInterface $container): FileManager
    {
        return new FileManager();
    }
}
