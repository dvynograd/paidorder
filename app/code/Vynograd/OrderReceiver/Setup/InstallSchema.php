<?php

namespace Vynograd\OrderReceiver\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Vynograd\OrderReceiver\Api\Data\PaidOrderInterface;

/**
 * Schema install
 *
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $setup->getConnection()
            ->newTable($setup->getTable(PaidOrderInterface::MAIN_TABLE))
            ->addColumn(
                PaidOrderInterface::ENTITY_ID,
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true,],
                'ID'
            )
            ->addColumn(
                PaidOrderInterface::ORDER_ID,
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Order ID'
            )
            ->addColumn(
                PaidOrderInterface::PRICE,
                Table::TYPE_FLOAT,
                null,
                ['nullable' => false],
                'Order price multiplied by the decimal factor'
            )
            ->addColumn(
                PaidOrderInterface::STORE_ID,
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Store Id'
            )
            ->addColumn(
                PaidOrderInterface::CREATED_AT,
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                PaidOrderInterface::UPDATED_AT,
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            )
            ->addForeignKey(
                $setup->getFkName(
                    $setup->getTable(PaidOrderInterface::MAIN_TABLE),
                    PaidOrderInterface::STORE_ID,
                    $setup->getTable('store'),
                    'store_id'
                ),
                PaidOrderInterface::STORE_ID,
                $setup->getTable('store'),
                'store_id',
                Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName(
                    $setup->getTable(PaidOrderInterface::MAIN_TABLE),
                    PaidOrderInterface::ORDER_ID,
                    $setup->getTable('catalog_product_entity'),
                    'entity_id'
                ),
                PaidOrderInterface::ORDER_ID,
                $setup->getTable('catalog_product_entity'),
                'entity_id',
                Table::ACTION_CASCADE
            )
            ->setComment('Store Access Personal Numbers White List');


        $setup->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
