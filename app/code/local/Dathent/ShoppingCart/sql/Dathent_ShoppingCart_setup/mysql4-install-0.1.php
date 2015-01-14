<?php

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$setup->startSetup();

$entityTypeId     = $setup->getEntityTypeId('customer');
$attributeSetId   = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$setup->addAttribute("customer", "partner_of_shopping",  array(
    "type"     => "varchar",
    "backend"  => "",
    "label"    => "Partner of shopping",
    "input"    => "text",
    "source"   => "",
    "visible"  => true,
    "required" => false,
    "default" => "",
    "frontend" => "",
    "unique"     => false,
    "note"       => "Partner of shopping"

));

$attribute   = Mage::getSingleton("eav/config")->getAttribute("customer", "partner_of_shopping");


$setup->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'partner_of_shopping',
    '999'
);

$used_in_forms=array();

$used_in_forms[]="adminhtml_customer";
$used_in_forms[]="checkout_register";
$used_in_forms[]="customer_account_create";
$used_in_forms[]="customer_account_edit";
$used_in_forms[]="adminhtml_checkout";
        $attribute->setData("used_in_forms", $used_in_forms)
            ->setData("is_used_for_customer_segment", true)
            ->setData("is_system", 0)
            ->setData("is_user_defined", 1)
            ->setData("is_visible", 1)
            ->setData("sort_order", 100)
        ;
        $attribute->save();

$setup->endSetup();