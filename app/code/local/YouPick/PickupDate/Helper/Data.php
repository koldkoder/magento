<?php
 
class YouPick_PickupDate_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getFormattedPickupDate($date, $format = Mage_Core_Model_Locale::FORMAT_TYPE_SHORT, $displayNullDateMsg = true)
    {
        $formattedDate = '';
        //Don't use the timezone adjustment - keep date as it is, last arg false.
        if($date != NULL)
        {
            $date = Mage::app()->getLocale()->date($date, Varien_Date::DATE_INTERNAL_FORMAT, NULL, false);
            $format = Mage::app()->getLocale()->getDateFormat($format);
	    $formattedDate = $date->toString($format);
        }
        else if($displayNullDateMsg)
            $formattedDate = $this->__('Date Not Specified');
	
        return $formattedDate;
    }

}
