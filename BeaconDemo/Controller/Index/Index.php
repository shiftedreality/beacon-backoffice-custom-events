<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\BeaconDemo\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Psr\Log\LoggerInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Index implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param PageFactory $pageFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        PageFactory $pageFactory,
        LoggerInterface $logger
    ) {
        $this->pageFactory = $pageFactory;
        $this->logger = $logger;
    }

    /**
     * @inheridDoc
     */
    public function execute(): ResultInterface
    {
        $this->logger->critical('My page was opened');

        return $this->pageFactory->create();
    }
}
