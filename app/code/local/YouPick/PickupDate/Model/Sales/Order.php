<?php
class YouPick_PickupDate_Model_Sales_Order extends Mage_Sales_Model_Order
{
    public function getDisplayFormattedPickupDate()
    {
        return Mage::helper('youpick_pickupdate')->getFormattedPickupDate($this->getDesiredPickupDate(), Mage_Core_Model_Locale::FORMAT_TYPE_FULL);
    }
}
