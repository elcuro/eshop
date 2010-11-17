<?php

class EshopItemsSchema extends CakeSchema {

        /**
         * Schema name
         *
         * @var string
         */
        public $name = 'EshopItems';

        /**
         * CakePHP schema
         *
         * @var array
         */
        public $eshop_items = array(
            'id' => array('type' => 'integer', 'null' => false, 'lenght' => 11, 'key' => 'primary'),
            'node_id' => array('type' => 'integer', 'null' => false, 'lenght' => 11),
            'parent_id' => array('type' => 'integer', 'null' => true, 'lenght' => 11),
            'lft' => array('type' => 'integer', 'null' => true, 'lenght' => 11),
            'rght' => array('type' => 'integer', 'null' => true, 'lenght' => 11),
            'eshop_supplier_id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'default' => 0),
            'title' => array('type' => 'string', 'null' => false, 'length' => 200, 'default' => 'title'),
            'description' => array('type' => 'string', 'null' => true, 'length' => 250, 'default' => ''),
            'order_code' => array('type' => 'string', 'null' => true, 'length' => 50),
            'supplier_order_code' => array('type' => 'string', 'null' => true, 'length' => 50),
            'supplier_price' => array('type' => 'float', 'null' => true),
            'vat' => array('type' => 'float', 'null' => false, 'default' => 19),
            'price_without_vat' => array('type' => 'float', 'null' => false),
            'delivery_days' => array('type' => 'integer', 'null' => true, 'length' => 4, 'default' => 14),
            'on_stock' => array('type' => 'integer', 'null' => true, 'length' => 4, 'default' => 2),
            'discount_percentage' => array('type' => 'float', 'null' => true),
            'note' => array('type' => 'text', 'null' => true),
            'created' => array('type' => 'timestamp', 'null' => false, 'length' => NULL),
            'updated' => array('type' => 'timestamp', 'null' => false, 'length' => NULL),
            'tableParameters' => array('charset' => 'utf8', 'engine' => 'MyISAM')
        );

        /**
         * Before callback
         *
         * @param array $event
         * @return void
         */
        public function before($event = array()) {

        }

        /**
         * After callback
         *
         * @param array $event
         * @return void
         */
        public function after($event = array()) {

        }

}

?>