<?php

namespace PhoenixConnection\Brands\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use PhoenixConnection\Brands\Helper\Data;

class Config extends Action
{

    protected $helperData;

    public function __construct(Context $context, Data $helperData)
    {
        $this->helperData = $helperData;
        return parent::__construct($context);
    }

    public function execute()
    {

        // TODO: Implement execute() method.

        echo $this->helperData->getGeneralConfig('enable');
        exit();

    }
}