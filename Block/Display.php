<?php
namespace PhoenixConnection\Brands\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use PhoenixConnection\Brands\Model\BrandFactory;

class Display extends Template
{
    protected $_brandFactory;
    public function __construct(Context $context, BrandFactory $brandFactory)
    {
        $this->_brandFactory = $brandFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getBrandCollection() {
        $brand = $this->_brandFactory->create();
        return $brand->getCollection();
    }
}