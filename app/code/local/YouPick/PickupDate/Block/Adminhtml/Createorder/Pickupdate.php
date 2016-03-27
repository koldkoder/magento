<?php
 
class YouPick_PickupDate_Block_Adminhtml_Createorder_Pickupdate
    extends Mage_Adminhtml_Block_Sales_Order_Create_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('sales_order_create_pickup_date_form');
    }
 
    public function getDisplayDate()
    {
        return Mage::helper('youpick_pickupdate')->getFormattedPickupDate($this->getCreateOrderModel()->getQuote()->getShippingAddress()->getDesiredPickupDate(), Mage_Core_Model_Locale::FORMAT_TYPE_SHORT, false);
    }
 
    public function getDateFormat()
    {
        return Mage::app()->getLocale()->getDateStrFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
    }
}
