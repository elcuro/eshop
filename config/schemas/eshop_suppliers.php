<?php

class EshopSuppliersSchema extends CakeSchema {

        /**
         * Schema name
         *
         * @var string
         */
        public $name = 'EshopSuppliers';

        /**
         * CakePHP schema
         *
         * @var array
         */
        public $eshop_suppliers = array(
            'id' => array('type' => 'integer', 'null' => false, 'lenght' => 11, 'key' => 'primary'),
            'name' => array('type' => 'string', 'null' => false, 'length' => 200),
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