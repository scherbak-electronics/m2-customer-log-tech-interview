<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Model\ResourceModel\CustomerConnexionLog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'customer_connexion_log_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Shch\CustomerLog\Model\CustomerConnexionLog::class,
            \Shch\CustomerLog\Model\ResourceModel\CustomerConnexionLog::class
        );
    }
}

