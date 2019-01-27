<?php

namespace Vynograd\OrderPublisher\Model\PaidOrder;

use Vynograd\OrderPublisher\Api\PaidOrder\MessageInterface;

/**
 * Class Message
 * @package Vynograd\OrderPublisher\Model\PaidOrder
 */
class Message implements MessageInterface
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $storeId;

    /**
     * @param int $orderId
     * @return MessageInterface
     */
    public function setOrderId(int $orderId): MessageInterface
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param float $price
     * @return MessageInterface
     */
    public function setPrice(float $price): MessageInterface
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param int $storeId
     * @return MessageInterface
     */
    public function setStoreId(int $storeId): MessageInterface
    {
        $this->storeId = $storeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->storeId;
    }
}
