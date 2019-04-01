<?php

namespace PhoenixConnection\Brands\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use PhoenixConnection\Brands\Model\BrandFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $_brandFactory;

    public function __construct(BrandFactory $postFactory)
    {
        $this->_brandFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.1', '<')) {
            $data = [
                ['title'        => 'Arizer',
                    'description'   => '',
                    'logo'          => ''
                ],
                ['title'        => 'Boundless',
                    'description'   => '',
                    'logo'          => ''
                ],
                ['title'        => 'Crater',
                    'description'   => '',
                    'logo'          => ''
                ],
                ['title'        => 'DaVinci',
                    'description'   => '',
                    'logo'          => ''
                ],
                ['title'        => 'Dynavao',
                    'description'   => '',
                    'logo'          => ''
                ],
                ['title'        => 'Firefly',
                    'description'   => '',
                    'logo'          => ''
                ],
                ['title'        => 'Flowermate',
                    'description'   => '',
                    'logo'          => ''
                ]
            ];
            $post = $this->_brandFactory->create();
            $post->addData($data)->save();
        }
    }
}