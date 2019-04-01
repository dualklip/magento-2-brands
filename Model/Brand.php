<?php
namespace PhoenixConnection\Brands\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Brand extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'phoenixconnection_brands_brand';

    protected $_cacheTag = 'phoenixconnection_brands_brand';

    protected $_eventPrefix = 'phoenixconnection_brands_brand';

    protected function _construct()
    {
        $this->_init('PhoenixConnection\Brands\Model\ResourceModel\Brand');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}