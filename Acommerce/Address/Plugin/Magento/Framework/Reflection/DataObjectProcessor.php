<?php

namespace Acommerce\Address\Plugin\Magento\Framework\Reflection;

class DataObjectProcessor
{
    public function beforeBuildOutputDataArray(
        \Magento\Framework\Reflection\DataObjectProcessor $subject,
        $dataObject, 
        $dataObjectType
    ) {
        if(ltrim($dataObjectType, '\/') == \Magento\Customer\Api\Data\AddressInterface::class){
            $dataObjectType = \Acommerce\Address\Api\Data\AddressInterface::class;
        }
        return [$dataObject, $dataObjectType];
    }
}