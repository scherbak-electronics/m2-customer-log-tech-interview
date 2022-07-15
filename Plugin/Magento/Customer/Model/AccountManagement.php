<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Plugin\Magento\Customer\Model;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Shch\CustomerLog\Model\CustomerConnexionLogRepository;
use Shch\CustomerLog\Helper\Data;

class AccountManagement
{

    private LoggerInterface $logger;
    private RemoteAddress $address;
    private CustomerConnexionLogRepository $connexionLogRepository;
    private Data $helperData;

    public function __construct(
        LoggerInterface $logger,
        RemoteAddress $address,
        CustomerConnexionLogRepository $connexionLogRepository,
        Data $helperData
    ) {
        $this->logger = $logger;
        $this->address = $address;
        $this->connexionLogRepository = $connexionLogRepository;
        $this->helperData = $helperData;
    }

    public function afterAuthenticate(
        \Magento\Customer\Model\AccountManagement $subject,
        $result,
        $username,
        $password
    ) {
        //Your plugin code u: aaaa@aaaa.com  pw: aA1111111!
        if ($this->helperData->isLogEnabled()) {
            try {
                $logModel = $this->connexionLogRepository->createNew();
                $logModel->setIp($this->address->getRemoteAddress());
                $logModel->setCustomerId($result->getId());
                $this->connexionLogRepository->save($logModel);
            } catch (LocalizedException $e) {
                $this->logger->critical('customer.log.plugin.after.auth: error: ' . $e->getMessage());
            }
        }
        return $result;
    }
}

