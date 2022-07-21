<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Block\Adminhtml\Customer;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Shch\CustomerLog\Model\CustomerConnexionLogRepository;

class Ip extends Template
{

    private CustomerConnexionLogRepository $customerConnexionLogRepository;
    /**
     * Constructor
     *
     * @param Context  $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        CustomerConnexionLogRepository $customerConnexionLogRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerConnexionLogRepository = $customerConnexionLogRepository;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        //Your block code
        $data = $this->_backendSession->getCustomerData();
        return $this->customerConnexionLogRepository->getLastIp($data['customer_id']);
    }
}
