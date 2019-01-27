<?php

namespace Vynograd\OrderPublisher\Api\PaidOrder;

/**
 * Interface PaidOrderMessageInterface
 * @package Vynograd\OrderPublisher\Api\Data
 */
interface MessageInterface
{
    /**
     * @param int $orderId
     * @return MessageInterface
     */
    public function setOrderId(int $orderId): self;

    /**
     * @return int
     */
    public function getOrderId(): int;

    /**
     * @param float $price
     * @return MessageInterface
     */
    public function setPrice(float $price): self;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @param int $storeId
     * @return MessageInterface
     */
    public function setStoreId(int $storeId): self;

    /**
     * @return int
     */
    public function getStoreId(): int;
}
