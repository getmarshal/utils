<?php

/**
 *
 */

declare(strict_types=1);

namespace Marshal\Utils\Logger;

use Psr\Log\LoggerInterface;

trait LoggerFactoryAwareTrait
{
    private LoggerFactory $loggerFactory;

    public function getLogger(string $name): LoggerInterface
    {
        return $this->loggerFactory->getLogger($name);
    }

    public function setLoggerFactory(LoggerFactory $loggerFactory): void
    {
        $this->loggerFactory = $loggerFactory;
    }
}
