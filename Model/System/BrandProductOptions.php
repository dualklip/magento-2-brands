<?php

namespace PhoenixConnection\Brands\Model\System;

use Magento\Framework\App\Area;
use Magento\Framework\View\DesignInterface;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;

class BrandProductOptions extends AbstractSource
{

    /**
     * @var DesignInterface
     */
    protected $design;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        DesignInterface $design,
        LoggerInterface $logger
    ) {
        $this->design = $design;
        $this->logger = $logger;
    }

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->design->getArea() === Area::AREA_FRONTEND) {
            //don't load this in a frontend context in case 3rd party extensions do not
            //honour 'visible_on_front'
            return ['0' => 'This info should not be needed in a frontend context'];
        }

        $objectManager = ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('phoenixconnection_brands'); //gives table name with prefix

        //Select Data from table
        $sql = 'Select title as label, id as value FROM ' . $tableName;
        $result = $connection->fetchAll($sql); // gives associated array, table fields as key in array.

        $this->_options = [];
        foreach ($result as $item){
            $this->_options[] = ['label' => __($item['label']), 'value'=>$item['value']];
        }

        return $this->_options;

    }
}
