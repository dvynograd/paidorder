<?php

namespace Vynograd\OrderReceiver\Api;

use Vynograd\OrderReceiver\Api\Data\PaidOrderInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface PaidOrderRepositoryInterface
 * @package Vynograd\OrderReceiver\Api
 */
interface PaidOrderRepositoryInterface
{

    /**
     * @param PaidOrderInterface $paidOrder
     * @return PaidOrderRepositoryInterface
     * @throws CouldNotSaveException
     */
    public function save(PaidOrderInterface $paidOrder): self;
}
