<?php
class YouPick_PickupDate_Block_Onepage_Pickupdate extends Mage_Checkout_Block_Onepage_Abstract
{
    public function __construct()
    {
        $this->setTemplate('youpick_pickupdate/checkout/onepage/shipping_method/pickupdate.phtml');     
    }
 
    public function getPostUrl()
    {
        return Mage::getUrl('pickupdate/index/ajax', array('_secure'=>true)); 
    }
}
