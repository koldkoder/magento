<?php
/* @var $installer Mage_Sales_Model_Entity_Setup */
$installer = $this;
 
$installer->startSetup();
 
$installer->getConnection()
    ->addColumn($installer->getTable('sales/quote_address'), 'desired_pickup_date', array(
        'TYPE'      => Varien_Db_Ddl_Table::TYPE_DATE,
        'NULLABLE'  => true,
        'COMMENT'   => 'Shipment Desired Pickup Date'
    ));
 
$installer->getConnection()
    ->addColumn($installer->getTable('sales/order'), 'desired_pickup_date', array(
        'TYPE'      => Varien_Db_Ddl_Table::TYPE_DATE,
        'NULLABLE'  => true,
        'COMMENT'   => 'Shipment Desired Pickup Date'
    ));
 
$installer->getConnection()
    ->addColumn($installer->getTable('sales/order_grid'), 'desired_pickup_date', array(
        'TYPE'      => Varien_Db_Ddl_Table::TYPE_DATE,
        'NULLABLE'  => true,
        'COMMENT'   => 'Shipment Desired Pickup Date'
    ));
 
$installer->getConnection()
    ->addKey($installer->getTable('sales/order_grid'), 'desired_pickup_date_idx', 'desired_pickup_date'
    );
 
$installer->endSetup();
