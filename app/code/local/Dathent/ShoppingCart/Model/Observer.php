<?php

class Dathent_ShoppingCart_Model_Observer
{

    public function checkPartner($observer)
    {

        $customer = $observer->getCustomer();

        if($partnerEmail = $customer->getPartnerOfShopping()){
            $beforeParentEmail = Mage::getModel('customer/customer')->load($customer->getId())->getPartnerOfShopping();
           if($partnerEmail !=  $beforeParentEmail && !$customer->getPartnerSave()){

               $partner = Mage::getModel('customer/customer')
                   ->setWebsiteId(Mage::app()->getStore()->getWebsiteId())
                   ->loadByEmail($partnerEmail);

               if($partner->getId()){
                   $partner
                       ->setPartnerOfShopping($customer->getEmail())
                       ->setPartnerSave('true')
                       ->save();
               }

               $beforeParent = Mage::getModel('customer/customer')
                   ->setWebsiteId(Mage::app()->getStore()->getWebsiteId())
                   ->loadByEmail($beforeParentEmail);

               if($beforeParent->getId()){
                   $beforeParent
                       ->setPartnerOfShopping('')
                       ->setPartnerSave('true')
                       ->save();
               }
           }

        }


    }

}
