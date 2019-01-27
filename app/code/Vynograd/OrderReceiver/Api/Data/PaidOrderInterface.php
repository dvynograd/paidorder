<?php

namespace Vynograd\OrderReceiver\Api\Data;

/**
 * Interface PaidOrderInterface
 * @package Vynograd\OrderReceiver\Api
 */
interface PaidOrderInterface
{
    /**
     * Cache tag.
     */
    const CACHE_TAG = 'vynograd_orderrecivier_paid_order';

    /**
     * Table name
     */
    const MAIN_TABLE = 'vynograd_paid_orders';

    /**#@+
     * Constants for keys of data array.
     */
    const ENTITY_ID = 'entity_id';
    const ORDER_ID = 'order_id';
    const PRICE = 'price';
    const STORE_ID = 'store_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * @param int $orderId
     * @return PaidOrderInterface
     */
    public function setOrderId(int $orderId): self;

    /**
     * @return int
     */
    public function getOrderId(): int;

    /**
     * @param float $price
     * @return PaidOrderInterface
     */
    public function setPrice(float $price): self;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @param int $storeId
     * @return PaidOrderInterface
     */
    public function setStoreId(int $storeId): self;

    /**
     * @return int
     */
    public function getStoreId(): int;

    /**
     * @param string $createdAt
     * @return PaidOrderInterface
     */
    public function setCreatedAt(string $createdAt): self;

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * @param string $updatedAt
     * @return PaidOrderInterface
     */
    public function setUpdatedAt(string $updatedAt): self;

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string;
}
