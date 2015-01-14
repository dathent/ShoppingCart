<?php

include(Mage::getBaseDir().DS."app".DS."code".DS."core".DS."Mage".DS."Checkout".DS."controllers".DS."CartController.php");

class Dathent_ShoppingCart_CartController extends Mage_Checkout_CartController
{


    public function addAction()
    {
        parent::addAction();
        $this->changeCartPartner();
    }



    public function updatePostAction()
    {
        parent::updatePostAction();
        $this->changeCartPartner();
    }

    public function deleteAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        if ($id) {
            parent::deleteAction();
            $this->changeCartPartner();
        }
    }

    private function changeCartPartner()
    {
        $customer = Mage::getModel('customer/session')->getCustomer();

        if($partnerEmail = $customer->getPartnerOfShopping()){
            $partner = Mage::getModel('customer/customer')
                ->setWebsiteId(Mage::app()->getStore()->getWebsiteId())
                ->loadByEmail($partnerEmail);
            if($partner->getId()){
                $items = $this->_getCart()->getItems();

            }


        }
    }

}
