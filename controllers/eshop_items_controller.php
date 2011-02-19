<?php
/**
* Eshop items controller
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopItemsController extends EshopAppController {
        
        /**
         * Controller name
         *
         * @var string
         */
        public $name = 'EshopItems';

        /**
         * Used models
         *
         * @var array
         */
        public $uses = array(
            'Node',
            'Eshop.EshopItem'
        );

        /**
         * Before filter callback,
         * disable CSFR security check to avoid security error
         *
         * @return void
         */
        function beforeFilter() {
                parent::beforeFilter();
                $this->Security->validatePost = false;
        }

        
        /**
         * Admin Index controller
         * Admin items for current node
         *
         * @param integer $id Node id
         * @return void
         */
        public function admin_index($node_id = false) {
                
                if (!$node_id) {
                        $this->Session->setFlash(__('Missing node id', true), 'default', 'error');
                }
                
                $items = $this->EshopItem->find('all', array('conditions' => array('node_id' => $node_id)));
                $node = $this->Node->read(null, $node_id);

                $this->set(compact('items', 'node'));
                $this->set('title_for_layout', __('Eshop items', true));
                
        }

        /**
         * Get all items for node,
         * used by requestAction from node admin (tab)
         *
         * @param integer $node_id
         * @return array
         */
        public function getItems($node_id) {

                return $this->EshopItem->find('all', array('conditions' => array('node_id' => $node_id)));

        }

        /**
         * Add item for node
         *
         * @param integer $node_id
         * @return array
         */
        public function admin_add($node_id = false) {

                if (!$node_id) {
                        $this->Session->setFlash(__('Add supplier - Missing node id', true), 'default', array('class' => 'error'));
                        $this->redirect($this->referer());
                }

                if (!empty($this->data)) {
                        $this->EshopItem->create();
                        if ($this->EshopItem->save($this->data)) {
                                $this->Session->setFlash(__('Eshop Item has been saved', true), 'default', array('class' => 'success'));
                                $this->redirect(array('action' => 'index', $this->data['EshopItem']['node_id']));
                        } else {
                                $this->Session->setFlash(__('Error during saving item', true), 'default', array('class' => 'error'));
                        }
                }

                $suppliers = $this->EshopItem->EshopSupplier->find('list');
                $node = $this->Node->read(null, $node_id);

                $this->set(compact('suppliers', 'node'));

        }

        /**
         * Add item for node
         *
         * @param integer $node_id
         * @return array
         */
        public function admin_edit($id = false) {

                if (!$id) {
                        $this->Session->setFlash(__('Missing Item ID', true), 'default', array('class' => 'error'));
                        $this->redirect($this->referer());
                }

                if (!empty($this->data)) {
                        $this->EshopItem->create();
                        if ($this->EshopItem->save($this->data)) {
                                $this->Session->setFlash(__('Eshop Item has been updated', true), 'default', array('class' => 'success'));
                                $this->redirect(array('action' => 'index', $this->data['EshopItem']['node_id']));
                        } else {
                                $this->Session->setFlash(__('Error during updating item', true), 'default', array('class' => 'error'));
                        }
                }

                $suppliers = $this->EshopItem->EshopSupplier->find('list');
                $this->set(compact('suppliers'));

                $this->data = $this->EshopItem->read(null, $id);

        }

        /**
         * Delete item
         *
         * @param integer $id Item id
         * @return array
         */
        public function admin_delete($id) {

                if (!$id) {
                        $this->Session->setFlash(__('Missing Item ID', true), 'default', array('class' => 'error'));
                        $this->redirect($this->referer());
                }

                if($this->EshopItem->delete($id)) {
                        $this->Session->setFlash(__('Item successfully deleted', true), 'default', array('class' => 'success'));
                        $this->redirect($this->referer());
                } else {
                        $this->Session->setFlash(__('Error occured while deleting item', true), 'default', array('class' => 'error'));
                        $this->redirect($this->referer());
                }

        }

}
