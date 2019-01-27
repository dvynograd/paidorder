<?php

namespace Vynograd\OrderPublisher\Model\Config;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Provider
{
    /**#@+
     * path to config.
     */
    const ENABLED = 'vynorad_order_update/general/enabled';
    const FACTOR = 'vynorad_order_update/general/channel_id';
    const ORDER_STATUS = 'vynorad_order_update/general/order_status';
    /**#@-*/

    /**
     * @var ScopeConfigInterface
     */
    private $configReader;

    /**
     * ConfigProvider constructor.
     * @param ScopeConfigInterface $configReader
     */
    public function __construct(ScopeConfigInterface $configReader)
    {
        $this->configReader = $configReader;
    }

    /**
     * @return string
     */
    public function isEnabled()
    {
        return (string) $this->configReader->getValue(
            self::ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getFactor()
    {
        return (string) $this->configReader->getValue(
            self::FACTOR,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return (string) $this->configReader->getValue(
            self::ORDER_STATUS,
            ScopeInterface::SCOPE_STORE
        );
    }
}
