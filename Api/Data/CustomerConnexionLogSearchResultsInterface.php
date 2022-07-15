<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Api\Data;

interface CustomerConnexionLogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get customer_connexion_log list.
     * @return \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface[]
     */
    public function getItems();

    /**
     * Set created_at list.
     * @param \Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

