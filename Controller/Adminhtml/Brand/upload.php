<?php

namespace PhoenixConnection\Brands\Controller\Adminhtml\brand;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use PhoenixConnection\Brands\Model\ImageUploader;
use Psr\Log\LoggerInterface;

class Upload extends Action implements HttpPostActionInterface
{
    /**
     * Image uploader
     *
     * @var \Magento\Catalog\Model\ImageUploader
     */
    public $imageUploader;

    /**
     * Logger
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Upload constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Catalog\Model\ImageUploader $imageUploader
     */
    public function __construct(
        Context $context,
        ImageUploader $imageUploader,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
        $this->logger = $logger;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('PhoenixConnection_Brands::phoenixconnection_upload');
    }

    /**
     * Upload file controller action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $imageId = $this->_request->getParam('param_name', 'logo');

        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}