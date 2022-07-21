<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Cron;

use Psr\Log\LoggerInterface;
use Shch\CustomerLog\Helper\Data;

class Notification
{

    protected LoggerInterface $logger;
    private Data $helper;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     * @param Data $helper
     */
    public function __construct(LoggerInterface $logger, Data $helper)
    {
        $this->logger = $logger;
        $this->helper = $helper;
    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {
        if ($this->helper->isLogEnabled()) {
            $this->helper->sendNotification();
            $this->logger->info("Cronjob Notification is executed.");
        }
    }
}

