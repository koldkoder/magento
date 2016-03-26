<?php
 
class YouPick_PickupDate_Block_Display_Pickupdate extends Mage_Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('youpick_pickupdate/sales/view_pickup_date.phtml');     
    }
 
    public function displayPickupDate()
    {
        $displayDate = false;
 
        if($this->getOrder()->getDesiredPickupDate() != NULL)
            $displayDate = true;
 
        return $displayDate;
    }
 
    public function getDisplayPickupDate()
    {
        return $this->getOrder()->getDisplayFormattedPickupDate();
    }
 
    public function getOrder()
    {
        return Mage::registry('current_order');
    }
}
