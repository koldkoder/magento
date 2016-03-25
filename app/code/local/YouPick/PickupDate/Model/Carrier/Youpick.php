<?php
class YouPick_PickupDate_Model_Carrier_Youpick
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{

    protected $_code = 'youpick';
    protected $_isFixed = true;

    protected $_startDaysOffset = 0;
    protected $_endDaysOffset = 2;
    /**
     * Enter description here...
     *
     * @param Mage_Shipping_Model_Rate_Request $data
     * @return Mage_Shipping_Model_Rate_Result
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        $result = Mage::getModel('shipping/rate_result');
         
	if (!empty($result)) {
            $method = Mage::getModel('shipping/rate_result_method');
            $method->setCarrier('youpick');
            $method->setCarrierTitle($this->getConfigData('title'));

            $method->setMethod('regular');
            $method->setMethodTitle('You Pick');

            $method->setPrice(0);
            $method->setCost(0);

            $result->append($method);
        }
        return $result;
    }

    /**
     * Get allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array('regular'=> 'You Pick');
    }

    public function getPickupDates()
    {
        $datesArray = array();
        $displayDate = Mage::getModel('core/locale')->storeDate();
	$displayDate->add($this->_startDaysOffset, Zend_Date::DAY);
	$dayOffset = $this->_startDaysOffset;
        do
        {
	    $datesArray[$displayDate->toString(Varien_Date::DATE_INTERNAL_FORMAT)] = Mage::helper('core')->formatDate($displayDate,  Mage_Core_Model_Locale::FORMAT_TYPE_FULL);	
	    $displayDate->add('1', Zend_Date::DAY);
            $dayOffset++;
        } while ($dayOffset <= $this->_endDaysOffset);
       return $datesArray;
   }
}
