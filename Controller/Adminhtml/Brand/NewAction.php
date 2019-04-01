<?php

namespace PhoenixConnection\Brands\Controller\Adminhtml\Brand;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Psr\Log\LoggerInterface;
use Magento\Backend\App\Action\Context;

class NewAction extends Action
{
    protected $logger;

    public function __construct(
        Context $context,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        /*$this->logger->alert('Mensaje Alerta');
        $this->logger->critical('Mensaje Crítico');
        $this->logger->debug('Mensaje Debug');
        $this->logger->emergency('Mensaje Emergencia');
        $this->logger->error('Mensaje Error');
        $this->logger->info('Mensaje Info');
        $this->logger->notice('Mensaje Notice');
        $this->logger->warning('Mensaje Warning');*/


        //$this->logger->info('PhoenixConnection_Brands: Nueva brand');
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
