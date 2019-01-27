<?php

namespace Vynograd\OrderReceiver\Model\Queue\PaidOrder;

use Vynograd\OrderPublisher\Api\PaidOrder\MessageInterface;
use Vynograd\OrderReceiver\Api\Data\PaidOrderInterface;
use Vynograd\OrderReceiver\Model\PaidOrderFactory;
use Vynograd\OrderReceiver\Api\PaidOrderRepositoryInterface;

class Consumer
{
    /**
     * @var PaidOrderFactory;
     */
    private $paidOrderFactory;

    /**
     * @var PaidOrderRepositoryInterface
     */
    private $paidOrderRepository;

    /**
     * Consumer constructor.
     * @param PaidOrderFactory $paidOrderFactory
     * @param PaidOrderRepositoryInterface $paidOrderRepository
     */
    public function __construct(PaidOrderFactory $paidOrderFactory, PaidOrderRepositoryInterface $paidOrderRepository)
    {
        $this->paidOrderFactory = $paidOrderFactory;
        $this->paidOrderRepository = $paidOrderRepository;
    }


    public function processMessage(MessageInterface $message)
    {
        /** @var PaidOrderInterface $paidOrder */
        $paidOrder = $this->paidOrderFactory->create();
        $paidOrder->setOrderId($message->getOrderId());
        $paidOrder->setPrice($message->getPrice());
        $paidOrder->setStoreId($message->getStoreId());
        $this->paidOrderRepository->save($paidOrder);
    }

}