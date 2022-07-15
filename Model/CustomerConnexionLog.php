<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Model;

use Magento\Framework\Model\AbstractModel;
use Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface;

class CustomerConnexionLog extends AbstractModel implements CustomerConnexionLogInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Shch\CustomerLog\Model\ResourceModel\CustomerConnexionLog::class);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerConnexionLogId()
    {
        return $this->getData(self::CUSTOMER_CONNEXION_LOG_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerConnexionLogId($customerConnexionLogId)
    {
        return $this->setData(self::CUSTOMER_CONNEXION_LOG_ID, $customerConnexionLogId);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inheritDoc
     */
    public function getIp()
    {
        return $this->getData(self::IP);
    }

    /**
     * @inheritDoc
     */
    public function setIp($ip)
    {
        return $this->setData(self::IP, $ip);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }
}

