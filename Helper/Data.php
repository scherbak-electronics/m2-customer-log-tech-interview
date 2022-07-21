<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Helper;


use Magento\Framework\App\Area;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\Store;
use Psr\Log\LoggerInterface;
use Shch\CustomerLog\Model\CustomerConnexionLogRepository;

class Data extends AbstractHelper
{
    private TransportBuilder $transportBuilder;
    private LoggerInterface $logger;
    private CustomerConnexionLogRepository $connexionLogRepository;

    /**
     * @param Context $context
     * @param TransportBuilder $transportBuilder
     * @param CustomerConnexionLogRepository $connexionLogRepository
     */
    public function __construct(
        Context $context,
        TransportBuilder $transportBuilder,
        CustomerConnexionLogRepository $connexionLogRepository
    ) {
        parent::__construct($context);
        $this->transportBuilder = $transportBuilder;
        $this->logger = $context->getLogger();
        $this->connexionLogRepository = $connexionLogRepository;
    }

    public function isLogEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag('customer/customer_log/track_customer_connexions', ScopeInterface::SCOPE_STORE);
    }

    public function sendNotification()
    {
        try {
            $transport = $this->transportBuilder
                ->setTemplateIdentifier('notification_email')
                ->setTemplateOptions([
                    'area' => Area::AREA_FRONTEND,
                    'store' => Store::DEFAULT_STORE_ID
                ])
                ->setTemplateVars([
                    'total_connexions'  => $this->connexionLogRepository->getConnCount(),
                ])
                ->setFrom([
                    'name' => $this->scopeConfig->getValue('trans_email/ident_general/name'),
                    'email' => $this->scopeConfig->getValue('trans_email/ident_general/email')
                ])
                ->addTo('admin@fr.christianlouboutin.com', 'Christian Louboutin')
                ->getTransport();
            $transport->sendMessage();
        } catch (\Exception $e) {
            $this->logger->debug($e->getMessage());
        }
    }
}
