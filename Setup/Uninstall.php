<?php
namespace PhoenixConnection\Brands\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
//use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Product;

class Uninstall implements UninstallInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    //private $eavSetupFactory;

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        #Delete the brand custom attribute of products schema
        /*$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->removeAttribute(
            Product::ENTITY,
            'brand');*/

        #Delete the table
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->dropTable($installer->getTable('phoenixconnection_brands'));

        $installer->endSetup();
    }
}