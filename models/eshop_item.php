<?php
/**
* Eshop item model, using table 'items'
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopItem extends EshopAppModel {

        /**
        * Model name
        *
        * @var string
        */
	public $name = 'EshopItem';

        /**
         * Belongs To association
         *
         * @var array
         */
        public $belongsTo = array(
            'EshopSupplier' => array(
                'className' => 'Eshop.EshopSupplier'
            )
        );

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'title' => array(
                'rule' => 'notEmpty',
                'message' => 'Title is required',
            ),
            'vat' => array(
                'rule' => 'numeric',
                'message' => 'VAT is required and must be numeric'
            ),
            'price_without_vat' => array(
                'rule' => 'numeric',
                'message' => 'Price without VAT is required and must be numeric'
            )
        );

}
?>