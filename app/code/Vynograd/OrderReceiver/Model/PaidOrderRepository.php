<?php

namespace Vynograd\OrderReceiver\Model;

use Vynograd\OrderReceiver\Api\PaidOrderRepositoryInterface;
use Vynograd\OrderReceiver\Api\Data\PaidOrderInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Vynograd\OrderReceiver\Model\ResourceModel\PaidOrder as PaidOrderResourceModel;

/**
 * Class PaidOrderRepository
 * @package Vynograd\OrderReceiver\Model
 */
class PaidOrderRepository implements PaidOrderRepositoryInterface
{
    /**
     * @var PaidOrderResourceModel
     */
    private $resource;

    /**
     * PaidOrderRepository constructor.
     * @param PaidOrderResourceModel $resourse
     */
    public function __construct(PaidOrderResourceModel $resourse)
    {
        $this->resource = $resourse;
    }

    /**
     * {@inheritdoc}
     */
    public function save(PaidOrderInterface $paidOrder): PaidOrderRepositoryInterface
    {
        try {
            $this->resource->save($paidOrder);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the whitelist: %1', $exception->getMessage()),
                $exception
            );
        }
        return $this;
    }
}
