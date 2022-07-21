<?php
/**
 * Copyright © Scherbak Electronics All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Shch\CustomerLog\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Shch\CustomerLog\Api\CustomerConnexionLogRepositoryInterface;
use Shch\CustomerLog\Api\Data\CustomerConnexionLogInterface;
use Shch\CustomerLog\Api\Data\CustomerConnexionLogInterfaceFactory;
use Shch\CustomerLog\Api\Data\CustomerConnexionLogSearchResultsInterfaceFactory;
use Shch\CustomerLog\Model\ResourceModel\CustomerConnexionLog as ResourceCustomerConnexionLog;
use Shch\CustomerLog\Model\ResourceModel\CustomerConnexionLog\CollectionFactory as CustomerConnexionLogCollectionFactory;

class CustomerConnexionLogRepository implements CustomerConnexionLogRepositoryInterface
{

    /**
     * @var CustomerConnexionLogInterfaceFactory
     */
    protected $customerConnexionLogFactory;

    /**
     * @var CustomerConnexionLogCollectionFactory
     */
    protected $customerConnexionLogCollectionFactory;

    /**
     * @var CustomerConnexionLog
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceCustomerConnexionLog
     */
    protected $resource;


    /**
     * @param ResourceCustomerConnexionLog $resource
     * @param CustomerConnexionLogInterfaceFactory $customerConnexionLogFactory
     * @param CustomerConnexionLogCollectionFactory $customerConnexionLogCollectionFactory
     * @param CustomerConnexionLogSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCustomerConnexionLog $resource,
        CustomerConnexionLogInterfaceFactory $customerConnexionLogFactory,
        CustomerConnexionLogCollectionFactory $customerConnexionLogCollectionFactory,
        CustomerConnexionLogSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->customerConnexionLogFactory = $customerConnexionLogFactory;
        $this->customerConnexionLogCollectionFactory = $customerConnexionLogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        CustomerConnexionLogInterface $customerConnexionLog
    ) {
        try {
            $this->resource->save($customerConnexionLog);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customerConnexionLog: %1',
                $exception->getMessage()
            ));
        }
        return $customerConnexionLog;
    }

    /**
     * @inheritDoc
     */
    public function get($customerConnexionLogId)
    {
        $customerConnexionLog = $this->customerConnexionLogFactory->create();
        $this->resource->load($customerConnexionLog, $customerConnexionLogId);
        if (!$customerConnexionLog->getId()) {
            throw new NoSuchEntityException(__('customer_connexion_log with id "%1" does not exist.', $customerConnexionLogId));
        }
        return $customerConnexionLog;
    }

    public function createNew()
    {
        return $this->customerConnexionLogFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customerConnexionLogCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function getConnCount() : int
    {
        $oneDayBefore = (new \DateTime())->sub(new \DateInterval('P1D'))->format('Y-m-d H:i:s');
        $collection = $this->customerConnexionLogCollectionFactory->create();
        $collection->addFieldToFilter('created_at', ['from' => $oneDayBefore]);
        return $collection->count();
    }

    public function getLastIp($customerId): string
    {
        $collection = $this->customerConnexionLogCollectionFactory->create();
        $select = $collection->getSelect();
            $select->columns(
                new \Zend_Db_Expr('ip, max(created_at)')
            )
            ->where('customer_id = ?', $customerId);
        $res = $this->resource->getConnection()->fetchRow($select);
        return $res['ip'];
    }

    /**
     * @inheritDoc
     */
    public function delete(
        CustomerConnexionLogInterface $customerConnexionLog
    ) {
        try {
            $customerConnexionLogModel = $this->customerConnexionLogFactory->create();
            $this->resource->load($customerConnexionLogModel, $customerConnexionLog->getCustomerConnexionLogId());
            $this->resource->delete($customerConnexionLogModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the customer_connexion_log: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($customerConnexionLogId)
    {
        return $this->delete($this->get($customerConnexionLogId));
    }
}

