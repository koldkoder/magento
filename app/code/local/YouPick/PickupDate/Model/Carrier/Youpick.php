<?php
class YouPick_PickupDate_Model_Carrier_Youpick
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{

    protected $_code = 'youpick';
    protected $_isFixed = true;

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

            $method->setMethod('youpick_regular');
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
        return array('youpick_regular'=> 'You Pick');
    }

}
