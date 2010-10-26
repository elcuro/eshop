<?php
/**
* Eshop supplier model, using table 'suppliers'
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopSupplier extends EshopAppModel {

        /**
        * Model name
        *
        * @var string
        */
	public $name = 'EshopSupplier';

        /**
         * HasMany association
         *
         * @var array
         */
        public $hasMany = array(
            'EshopItem' => array(
                'className' => 'Eshop.EshopItem',
                'dependent' => true
            )
        );

}
?>