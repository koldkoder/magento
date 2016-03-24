<?php
class YouPick_PickupDate_Block_Onepage_Pickupdate_Dropdown extends Mage_Checkout_Block_Onepage_Abstract
{
    public function __construct()
    {
        $this->setTemplate('youpick_pickupdate/checkout/onepage/shipping_method/datedropdown.phtml');     
    }

    protected function _getCarrierMethodCode()
    {
        if(!$this->hasShippingCode())
            $this->setShippingCode($this->getQuote()->getShippingAddress()->getShippingMethod());
 
        if(trim($this->getShippingCode()) != '')
            $returnValue =  explode('_', $this->getShippingCode());
        else
            $returnValue = false;
 
        return $returnValue;
    }
 
    public function displayPickupDate()
    {
        $returnValue = false;
        $fullCode = $this->_getCarrierMethodCode();
 
        if(is_array($fullCode))
            $returnValue = Mage::getStoreConfigFlag('carriers/'.$fullCode[0].'/show_pickup_date');

	
	Zend_Debug::dump($returnValue);
	Zend_Debug::dump($fullCode);
	 
        return $returnValue;
    }

    public function getSelectedPickupDate()
    {
        return $this->getQuote()->getShippingAddress()->getDesiredPickupDate();
    }

    public function getPickupDateArrayOptions()
    {
        $returnValue = array("Volvo", "Bmw", "Toyotoa");
 
        return $returnValue;
    }

}
