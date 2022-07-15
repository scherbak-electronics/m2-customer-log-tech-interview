<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Api\Data;

interface CustomerConnexionLogInterface
{

    const CUSTOMER_ID = 'customer_id';
    const UPDATED_AT = 'updated_at';
    const CUSTOMER_CONNEXION_LOG_ID = 'customer_connexion_log_id';
    const CREATED_AT = 'created_at';
    const IP = 'ip';

    /**
     * Get customer_connexion_log_id
     * @return string|null
     */
    public function getCustomerConnexionLogId();

    /**
     * Set customer_connexion_log_id
     * @param string $customerConnexionLogId
     * @return \Shch\CustomerLog\CustomerConnexionLog\Api\Data\CustomerConnexionLogInterface
     */
    public function setCustomerConnexionLogId($customerConnexionLogId);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Shch\CustomerLog\CustomerConnexionLog\Api\Data\CustomerConnexionLogInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Shch\CustomerLog\CustomerConnexionLog\Api\Data\CustomerConnexionLogInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get ip
     * @return string|null
     */
    public function getIp();

    /**
     * Set ip
     * @param string $ip
     * @return \Shch\CustomerLog\CustomerConnexionLog\Api\Data\CustomerConnexionLogInterface
     */
    public function setIp($ip);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Shch\CustomerLog\CustomerConnexionLog\Api\Data\CustomerConnexionLogInterface
     */
    public function setCustomerId($customerId);
}

