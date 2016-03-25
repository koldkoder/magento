<?php

 
class YouPick_PickupDate_Block_Onepage_Progress extends Mage_Checkout_Block_Onepage_Progress
{
    public function displayPickupDate()
    {
        $displayDate = false;
 
        if($this->getQuote()->getShippingAddress()->getDesiredPickupDate() != NULL)
            $displayDate = true;
 
        return $displayDate;
    }
 
    public function getDisplayPickupDate()
    {
        return Mage::helper('youpick_pickupdate')->getFormattedPickupDate($this->getQuote()->getShippingAddress()->getDesiredPickupDate(), Mage_Core_Model_Locale::FORMAT_TYPE_FULL);
    }
}
