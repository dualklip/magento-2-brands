<?php

namespace PhoenixConnection\Brands\Controller\Adminhtml\Brand;

use PhoenixConnection\Brands\Model\BrandFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends Action
{
    private $brandFactory;
    protected $dataPersistor;

    public function __construct(
        Context $context,
        BrandFactory $brandFactory,
        DataPersistorInterface $dataPersistor
    ) {
        $this->brandFactory = $brandFactory;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue()['general'];
        $data = $this->_filterFoodData($data);
        $this->brandFactory->create()
            ->setData($data)
            ->save();
        return $this->resultRedirectFactory->create()->setPath('brands/index/index');
    }

    public function _filterFoodData(array $rawData)
    {
        //Replace icon with fileuploader field name
        $data = $rawData;
        if (isset($data['logo'][0]['name'])) {
            $data['logo'] = $data['logo'][0]['name'];
        } else {
            $data['logo'] = null;
        }
        return $data;
    }
}
