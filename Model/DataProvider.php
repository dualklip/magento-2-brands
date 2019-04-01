<?php

namespace PhoenixConnection\Brands\Model;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{

    public function getData()
    {

        $items = $this->collection->getItems();

        //Replace icon with fileuploader field name
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
            if ($model->getIcon()) {
                $m['logo'][0]['name'] = $model->getIcon();
                $m['logo'][0]['url'] = $this->getMediaUrl().$model->getIcon();
                $fullData = $this->loadedData;
                $this->loadedData[$model->getId()] = array_merge($fullData[$model->getId()], $m);
            }
        }

        return $this->loadedData;
    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'catalog/tmp/product/';
        return $mediaUrl;
    }
}