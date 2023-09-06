<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\BeaconDemo\Plugin;

use Magento\SalesOrdersDataExporter\Model\Provider\CustomAttribute;
use Psr\Log\LoggerInterface;

class LogAdditionalData
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterGet(CustomAttribute $subject, array $result, array $values): array
    {
        $this->logger->critical(
            json_encode($values)
        );

        return $result;
    }
}
