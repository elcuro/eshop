<?php

class EshopOrdersSchema extends CakeSchema {

        /**
         * Schema name
         *
         * @var string
         */
        public $name = 'EshopOrders';

        /**
         * CakePHP schema
         *
         * @var array
         */
        public $eshop_orders = array(
            'id' => array('type' => 'integer', 'null' => false, 'lenght' => 11, 'key' => 'primary'),
            'name' => array('type' => 'string', 'null' => false, 'length' => 200),
            'adress_street' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'adress_city' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'adress_zip' => array('type' => 'string', 'null' => true, 'lenth' => 6),
            'adress_country' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'contact_phone' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'contact_fax' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'contact_email' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'companyid' => array('type' => 'string', 'null' => true, 'lenth' => 20),
            'companyid_vat' => array('type' => 'string', 'null' => true, 'lenth' => 20),
            'delivery_adress_name' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'delivery_adress_street' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'delivery_adress_city' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'delivery_adress_zip' => array('type' => 'string', 'null' => true, 'lenth' => 6),
            'delivery_country' => array('type' => 'string', 'null' => true, 'lenth' => 200),
            'items' => array('type' => 'text', 'null' => false),
            'order_note' => array('type' => 'text', 'null' => true),
            'shipping' => array('type' => 'string', 'null' => false, 'lenth' => 50),
            'note' => array('type' => 'text', 'null' => true),
            'status' => array('type' => 'string', 'null' => false, 'lenth' => 50),
            'payement' => array('type' => 'string', 'null' => false, 'lenth' => 50),
            'created' => array('type' => 'timestamp', 'null' => true),
            'updated' => array('type' => 'timestamp', 'null' => true),
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