<?php
/**
* Eshop order model
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopOrder extends EshopAppModel {

        /**
        * Model name
        *
        * @var string
        */
	public $name = 'EshopOrder';

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'name' => array(
                'rule' => 'notEmpty',
                'message' => 'Name is required',
            ),
            'adress_street' => array(
                'rule' => 'notEmpty',
                'message' => 'Adress is required',
            ),
            'adress_city' => array(
                'rule' => 'notEmpty',
                'message' => 'City is required',
            ),
            'contact_email' => array(
                'rule' => 'email',
                'message' => 'Email with right syntax is required',
            )
        );

}
?>