<?php
/**
* Basket controller
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopBasketController extends EshopAppController {

        /**
         * Used models
         *
         * @var array
         */
        public $uses = array('Eshop.EshopItem');

        /**
         * Add item to basket session, as item_id => items_count pair
         * and redirect basket view
         *
         * @return void
         */
	function add() {

                if (!$items = $this->Session->read('Eshop.items')) {
                        $items = array();
                }
                $items[$this->data['EshopItem']['id']] = 1;
                $this->Session->write('Eshop.items', $items);
                $this->Session->write('Eshop.last_page', $this->referer());

                $this->Session->setFlash(__('Eshop Item has been added', true), 'default', array('class' => 'success'));
                $this->redirect(array('plugin' => 'eshop', 'controller' => 'eshop_basket', 'action' => 'view'));

	}

        /**
         * Remove item from basket
         *
         * @param int $priceid id of item
         * @return void
         */
	function delete($item_id = null) {

                if (!$item_id) {
                        $this->Session->setFlash(__('Wrong item_id for delete', true), 'default', array('class' => 'error'));
                } else {
                        $session_items = $this->Session->read('Eshop.items');
                        unset($session_items[$item_id]);
                        $this->Session->write('Eshop.items', $session_items);
                        $this->Session->setFlash(__('Item was removed from basket', true), 'default', array('class' => 'success'));
                }
                
                $this->redirect(array('plugin' => 'eshop', 'controller' => 'eshop_basket', 'action' => 'view'));

	}

        /**
         * View basket
         *
         * @return void
         */
	function view() {

                $referer = $this->Session->read('Eshop.last_page');

                $session_items = array();
                $session_items = $this->Session->read('Eshop.items');

                $items = array();
                foreach ($session_items as $item_id => $item_count) {
                        $data = array();
                        $this->EshopItem->unbindModel(
                                array('belongsTo' => array('EshopSupplier'))
                        );
			$data = $this->EshopItem->findById($item_id);
                        $data['count'] = $item_count;
                        $items[] = $data;
		}
		$this->set(compact('items', 'referer'));

	}

        /**
         * Recalc when count changed, ajax request from basket view
         *
         * @param int $item_id
         * @param int $item_count
         * @return void
         */
        public function recalc($item_id = null, $item_count = null) {

                $item_id = (int) $item_id;
                $item_count = (int) $item_count;

                if($this->RequestHandler->isAjax()) {
                        if (($item_id > 0) && ($item_count > 0)) {
                                $items = $this->Session->read('Eshop.items');
                                $items[$item_id] = $item_count;
                                $this->Session->write('Eshop.items', $items);
                        }
                        // output view
                        $this->layout ='ajax';
                        $this->view();
                        $this->render('view');
                }

        }

        /**
         * Baset summary (called from basket_summary element)
         *
         * @return void
         */
        public function basketSummary() {

                //$this->autoRender = FALSE;

                $items = $this->Session->read("Eshop.items");
                $this->set('basket_summary', $this->EshopItem->findCalculatedBasketItems($items));
                $this->layout = 'ajax';

        }

}
?>
