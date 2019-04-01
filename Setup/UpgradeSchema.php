<?php

namespace PhoenixConnection\Brands\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.2.1', '<')) {
            $table = $installer->getTable('phoenixconnection_brands');
            $connection = $installer->getConnection();
            $connection->addColumn(
                $table,
                'logo',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'length' => '255',
                    'comment' => 'Logo of the Brand',
                    'after' => 'description'
                ]
            );
            $connection->addColumn(
                $table,
                'updated_at',
                [
                    'type' => Table::TYPE_TIMESTAMP,
                    'nullable' => false,
                    'length' => null,
                    'comment' => 'Updated At',
                    'after' => 'created_at'
                ]
            );
            $connection->modifyColumn(
                $table,
                'created_at',
                [
                    'type' => Table::TYPE_TIMESTAMP,
                    'nullable' => false,
                    'length' => null,
                    'comment' => 'Created At',
                    'after' => 'logo'
                ]
            );
            $connection
                ->dropColumn(
                    $table,
                    'file'
                );
            $connection->dropColumn(
                $table,
                'summary'
            );
        }


        $installer->endSetup();
    }
}