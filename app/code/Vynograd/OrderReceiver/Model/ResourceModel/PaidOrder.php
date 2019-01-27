<?php
namespace Vynograd\OrderReceiver\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Vynograd\OrderReceiver\Api\Data\PaidOrderInterface;

/**
 * Class PaidOrder
 * @package Vynograd\OrderReceiver\Model\ResourceModel
 */
class PaidOrder extends AbstractDb
{
    /**
     * Resource initialization.
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     * @codingStandardsIgnoreStart
     * @return void
     */
    protected function _construct()
    {
        /** @codingStandardsIgnoreEnd */
        $this->_init(PaidOrderInterface::MAIN_TABLE, PaidOrderInterface::ENTITY_ID);
    }
}
