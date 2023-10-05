<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\BeaconDemo\Plugin;

use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class ModifyOrder
{
    public function beforeSave(OrderRepositoryInterface $subject, OrderInterface $order)
    {
        $items = $order->getItems();

        foreach ($items as $item) {
            $item->setAdditionalData(
                // This is the custom data for custom attributes
                json_encode(['order_line_item1' => 'Order line item value 1'])
            );
        }

        $payment = $order->getPayment();

        // Order level
        if ($payment) {
            $payment->setAdditionalInformation('order_item1', 'Order item 1');
            $order->setPayment($payment);
        }

        $order->setItems($items);
    }
}
