<?php
/**
 * Our class name should follow the directory structure of
 * our Observer.php model, starting from the namespace,
 * replacing directory separators with underscores.
 * i.e. app/code/local/YouPick/
 *                     Pickupdate/Model/Observer.php
 */
class YouPick_PickupDate_Model_Observer
{
    /**
     * Magento passes a Varien_Event_Observer object as
     * the first parameter of dispatched events.
     */
    public function saveDesiredPickupDate($observer)
    {
	//we're looking at the data POSTed to the OnepageController, and setting the pickup date that was posted into the quote that is being built up during the checkout process
	$postData = $observer->getRequest()->getPost();
	
	if(isset($postData['pickup_date']))
        {
            $pickupDate = (empty($postData['pickup_date'])) ? NULL : $postData['pickup_date'];
            $observer->getQuote()->getShippingAddress()->setDesiredPickupDate($pickupDate); 
        }
    }

   public function copyDesiredPickupDateToQuote($observer)
   {
     	$observer->getQuote()->getShippingAddress()->setDesiredPickupDate($observer->getOrder()->getDesiredPickupDate());
   }

}
