<?php

namespace Vynograd\OrderPublisher\Plugin;

use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Vynograd\OrderPublisher\Model\Config\Provider as ConfigProvider;
use Vynograd\OrderPublisher\Queue\Publisher;

class OrderState
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @var Publisher
     */
    private $publisher;

    /**
     * OrderState constructor.
     * @param ConfigProvider $configProvider
     * @param Publisher $publisher
     */
    public function __construct(
        ConfigProvider $configProvider,
        Publisher $publisher
    ) {
        $this->publisher = $publisher;
    }


    /**
     * @param OrderRepositoryInterface $subject
     * @param OrderInterface $result
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @return mixed
     */
    public function afterSave(OrderRepositoryInterface $subject, $result)
    {
        if ($this->configProvider->isEnabled() && $result->getState() == $this->configProvider->getOrderStatus()) {
            $this->publisher->publish($subject);
        }
        return $result;
    }
}