<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomerConnexionLogRepositoryInterface
{

    /**
     * Save customer_connexion_log
     * @param \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface $customerConnexionLog
     * @return \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface $customerConnexionLog
    );

    /**
     * Retrieve customer_connexion_log
     * @param string $customerConnexionLogId
     * @return \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customerConnexionLogId);

    /**
     * Retrieve customer_connexion_log matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Shch\CustomerLog\Api\Data\CustomerConnexionLogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete customer_connexion_log
     * @param \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface $customerConnexionLog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface $customerConnexionLog
    );

    /**
     * Delete customer_connexion_log by ID
     * @param string $customerConnexionLogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customerConnexionLogId);
}

