<?php

namespace Vynograd\OrderPublisher\Queue;

use Magento\Framework\MessageQueue\PublisherInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Vynograd\OrderPublisher\Model\Config\Provider as ConfigProvider;
use Vynograd\OrderPublisher\Api\PaidOrder\MessageInterface;
use Vynograd\OrderPublisher\Model\PaidOrder\MessageFactory;
use Psr\Log\LoggerInterface;

class Publisher
{
    /**
     * Topic name
     */
    const TOPIC_NAME = 'vynograd.order.updates';
    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * @var PublisherInterface
     */
    private $publisher;

    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Publisher constructor.
     * @param MessageFactory $messageFactory
     * @param PublisherInterface $publisher
     * @param ConfigProvider $configProvider
     * @param LoggerInterface $logger
     */
    public function __construct(
        MessageFactory $messageFactory,
        PublisherInterface $publisher,
        ConfigProvider $configProvider,
        LoggerInterface $logger
    ) {
        $this->messageFactory = $messageFactory;
        $this->publisher = $publisher;
        $this->configProvider = $configProvider;
        $this->logger = $logger;
    }

    /**
     * @param string $status
     * @param string $orderId
     * @param bool $isEmailSent
     */
    public function publish(OrderInterface $order): void
    {
        try {
            $message = $this->createMessage($order);
            $this->publisher->publish(self::TOPIC_NAME, $message);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());
        }
    }


    private function createMessage(OrderInterface $order): MessageInterface
    {
        /** @var MessageInterface $message */
        $message = $this->messageFactory->create();
        $message->setOrderId($order->getEntityId());
        $message->setPrice($order->getTotalPaid() * $this->configProvider->getFactor());
        $message->setStoreId($order->getStoreId());
        return $message;
    }
}