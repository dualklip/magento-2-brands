<?php
namespace PhoenixConnection\Brands\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use PhoenixConnection\Brands\Model\BrandFactory;

class Index extends Template
{
    protected $_brandFactory;
    public function __construct(Context $context, BrandFactory $brandFactory)
    {
        $this->_brandFactory = $brandFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World 2');
    }

    public function getBrandCollection() {
        $brand = $this->_brandFactory->create();
        $collections = $brand->getCollection();
        return $brand->getCollection();
    }
}