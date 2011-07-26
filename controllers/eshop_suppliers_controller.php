<?php
/**
* eshop_supplier_controller
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopSuppliersController extends EshopAppController {

        /**
         * Controller name
         *
         * @var string
         */
        public $name = 'EshopSuppliers';
        
        
        
        public function index( $name = null )
        {
        	$conditions = null;
        	
        	if( $name == null )
        	{

        		$suppliers = $this->EshopSupplier->find('all');
        	}else{
        		
        		$suppliers = $this->EshopSupplier->findByName( $name );
        		
        		//$suppliers = $this->EshopSupplier->read( null, $name );
        	}
        	
        	
        	$this->set('title_for_layout', __d( 'eshop', 'Suppliers', true));
            
            $this->set('suppliers', $suppliers);
        }
        
        

        /**
         * Admin index
         * listing of all suppliers
         *
         * @return void
         */
        public function admin_index() {

                $this->set('title_for_layout', __d( 'eshop', 'Suppliers', true));
                $suppliers = $this->EshopSupplier->find('all');
                $this->set('suppliers', $suppliers);

        }

        /**
         * Add supplier
         *
         * @return void
         */
        public function admin_add() {

                if (!empty($this->data)) {
                        $this->EshopSupplier->create();
                        if ($this->EshopSupplier->save($this->data)) {
                                $this->Session->setFlash(__d( 'eshop', 'The Supplier has been saved', true), 'default', array('class' => 'success'));
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__d( 'eshop', 'Error during supplier saving, contact admin', true), 'default', array('class' => 'error'));
                        }
                }

        }

        /**
         * Edit supplier
         *
         * @param integer $id  Supplier id
         * @return void
         */
        public function admin_edit($id = false) {

                if (!$id) {
                        $this->Session->setFlash(__d( 'eshop', 'Missing Supplier ID', true), 'default', array('class' => 'error'));
                        $this->redirect(array('action' => 'index'));
                }

                if (!empty($this->data)) {
                        $this->EshopSupplier->create();
                        if ($this->EshopSupplier->save($this->data)) {
                                $this->Session->setFlash(__d( 'eshop', 'The Supplier has been updated', true), 'default', array('class' => 'success'));
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__d( 'eshop', 'Error during supplier updating, contact admin', true), 'default', array('class' => 'error'));
                        }
                }

                $this->data = $this->EshopSupplier->read(null, $id);

        }

        /**
         * Delete supplier
         *
         * @param integer $id Supplier id
         * @return array
         */
        public function admin_delete($id = false) {

                if (!$id) {
                        $this->Session->setFlash(__d( 'eshop', 'Missing supplier ID', true));
                }

                if ($this->EshopSupplier->delete($id, true)) {
                        $this->Session->setFlash(__d( 'eshop', 'Supplier successfully deleted', true));
                } else {
                        $this->Session->setFlash(__d( 'eshop', 'Error during delete supplier, contact admin', true));
                }
                $this->redirect(array('action' => 'index'));

        }

}
