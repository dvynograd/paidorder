<?php

namespace Vynograd\OrderReceiver\Model;

use Vynograd\OrderReceiver\Api\Data\PaidOrderInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Vynograd\OrderReceiver\Model\ResourceModel\PaidOrder as PaidOrderResourceModel;

/**
 * Class PaidOrder
 * @package Vynograd\OrderReceiver\Model
 */
class PaidOrder extends AbstractModel implements IdentityInterface, PaidOrderInterface
{

    /**
     * Instantiate resource model.
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        /** @codingStandardsIgnoreEnd */
        $this->_init(PaidOrderResourceModel::class);
    }

    /**
     * @inheritdoc
     */
    public function getOrderId(): int
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * @inheritdoc
     */
    public function setOrderId(int $orderId): PaidOrderInterface
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * @inheritdoc
     */
    public function getPrice(): float
    {
        return $this->getData(self::PRICE);
    }

    /**
     * @inheritdoc
     */
    public function setPrice(float $price): PaidOrderInterface
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @inheritdoc
     */
    public function getStoreId(): int
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @inheritdoc
     */
    public function setStoreId(int $storeId): PaidOrderInterface
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function setCreatedAt(string $createdAt): PaidOrderInterface
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function setUpdatedAt(string $updatedAt): PaidOrderInterface
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
