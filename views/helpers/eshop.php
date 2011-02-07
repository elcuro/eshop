<?php
/**
 * Eshop helper
 *
 *
 * @package  Croogo
 * @author Juraj Jancuska <jjancuska@gmail.com>
 */
class EshopHelper extends AppHelper {

        /**
         * Used helpers
         *
         * @var array
         */
        public $helpers = array(
            'Html',
            'Layout',
        );

        /**
         * Add items element
         *
         * @return void
         */
        public function afterSetNode() {
                if ($this->Layout->node['Node']['type'] == 'product') {
                        $this->Layout->setNodeField('body',
                                $this->Layout->node('body') . $this->Layout->View->element('eshop_items_form', array('items' => $this->Layout->node['EshopItems'], 'plugin' => 'eshop')));
                }
        }
}?>