<?php
namespace PhoenixConnection\Brands\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use PhoenixConnection\Brands\Model\BrandFactory;

class Index extends Action
{
    protected $_pageFactory;
    protected $_brandFactory;

    public function __construct(Context $context, PageFactory $pageFactory, BrandFactory $brandFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_brandFactory = $brandFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        /*$brand = $this->_brandFactory->create();
        $collection = $brand->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }*/
        return $this->_pageFactory->create();
    }
}