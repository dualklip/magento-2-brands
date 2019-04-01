<?php

namespace PhoenixConnection\Brands\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use PhoenixConnection\Brands\Model\BrandFactory;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use PhoenixConnection\Brands\Model\System\BrandProductOptions;

class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    protected $_brandFactory;

    public function __construct(EavSetupFactory $eavSetupFactory, BrandFactory $brandFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->_brandFactory = $brandFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            ['title' => 'Arizer', 'description' => '', 'logo' => ''],
            ['title' => 'Boundless', 'description' => '', 'logo' => ''],
            ['title' => 'Crater', 'description' => '', 'logo' => ''],
            ['title' => 'DaVinci', 'description' => '', 'logo' => ''],
            ['title' => 'Dynavao', 'description' => '', 'logo' => ''],
            ['title' => 'Firefly', 'description' => '', 'logo' => ''],
            ['title' => 'Flowermate', 'description' => '', 'logo' => '']
        ];
        $post = $this->_brandFactory->create();
        $post->addData($data)->save();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'brand',
            [
                'group' => 'General',
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Brand',
                'input' => 'select',
                'class' => '',
                'source' => BrandProductOptions::class,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
    }
}