<?php

/**
 *
 */

declare(strict_types=1);

namespace Marshal\Utils\Logger;

use Psr\Log\LoggerInterface;

interface LoggerFactoryAwareInterface
{
    public function setLoggerFactory(LoggerFactory $loggerFactory): void;
    public function getLogger(string $name): LoggerInterface;
}
