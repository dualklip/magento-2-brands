<?php

namespace PhoenixConnection\Brands\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Controller\Result\JsonFactory;
use PhoenixConnection\Brands\Model\ResourceModel\Brand;

class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory = false;

    /**
     * @var \Magento\Framework\App\Action\Context
     */
    protected $context;

    /**
     * @var Validator
     */
    protected $formKeyValidator;

    /**
     * @var Brand
     */
    protected $brands;

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Validator $formKeyValidator,
        JsonFactory $resultJsonFactory,
        Brand $brands
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
        $this->formKeyValidator = $formKeyValidator;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->brands = $brands;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('PhoenixConnection_Brands::list');
        $resultPage->addBreadcrumb(__('Brands'), __('Brands'));
        $resultPage->addBreadcrumb(__('List'), __('List'));
        $resultPage->getConfig()->getTitle()->prepend(__('Brands list'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('PhoenixConnection_Brands::phoenixconnection_list');
    }
}