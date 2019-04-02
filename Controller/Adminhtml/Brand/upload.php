<?php

namespace PhoenixConnection\Brands\Controller\Adminhtml\brand;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use PhoenixConnection\Brands\Model\ImageUploader;
use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\LocalizedException;

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
     * Base tmp path
     *
     * @var string
     */
    protected $baseTmpPath = 'brands/tmp/';

    /**
     * Base path
     *
     * @var string
     */
    protected $basePath = 'brands';

    /**
     * Upload constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Catalog\Model\ImageUploader $imageUploader
     * @param \Psr\Log\LoggerInterface $logger
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
        $this->_ensureDirExists($this->baseTmpPath);
        $this->_ensureDirExists($this->basePath);


        $imageId = $this->_request->getParam('param_name', 'logo');

        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }

    /**
     * Create a directory with write permissions or don't touch existing one
     *
     * @param string $dir
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _ensureDirExists($dir)
    {
        if (!file_exists($dir)) {
            $old = umask(0);
            mkdir($dir, 0775, true);
            umask($old);
        } elseif (!is_dir($dir)) {
            throw new LocalizedException(__("'%1' is not a directory.", $dir));
        }
    }
}