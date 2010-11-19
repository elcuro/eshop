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

        /**
         * Virtual fields
         *
         * @var array
         */
        public $virtualFields = array(
            'price_with_vat' => 'price_without_vat * (vat / 100 + 1)'
        );

        /**
         * Find all items saved in basket session
         *
         * @param array $var
         * @return array
         */
        public function findCalculatedBasketItems($items_from_session = null) {

                if (is_null($items_from_session)) {
                        return FALSE;
                }

                $prices_without_vat = array();
                $prices_with_vat = array();
                $items = array();
                if (is_array($items_from_session)) {
                        foreach ($items_from_session as $item_id => $item_count) {
                                $data = $this->findById($item_id);
                                $data[$this->name]['sum_without_vat'] = $prices_without_vat[] = $data[$this->name]['price_without_vat'] * $item_count;
                                $data[$this->name]['sum_with_vat'] = $prices_with_vat[] = $data[$this->name]['price_with_vat'] * $item_count;
                                $data[$this->name]['count'] = $item_count;
                                $items['Items'][] = $data;
                        }
                        $items['Sums']['sum_without_vat'] = array_sum($prices_without_vat);
                        $items['Sums']['sum_with_vat'] = array_sum($prices_with_vat);

                        return $items;
                }

                return false;

        }

}
?>