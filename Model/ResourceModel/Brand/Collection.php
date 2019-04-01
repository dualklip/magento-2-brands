<?php
namespace PhoenixConnection\Brands\Model\ResourceModel\Brand;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'phoenixconnection_brands_brand_collection';
    protected $_eventObject = 'brand_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PhoenixConnection\Brands\Model\Brand', 'PhoenixConnection\Brands\Model\ResourceModel\Brand');
    }

}