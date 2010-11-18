<?php
/**
* Eshop order controller
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopOrdersController extends EshopAppController {

        /**
         * Used models
         *
         * @var array
         */
        public $uses = array(
            'Eshop.EshopOrder',
            'Eshop.EshopItem'
        );

        /**
         * Used components
         *
         * @var array
         */
        public $components = array(
            'Email'
        );

        /**
         * before filter
         *
         * @return void
         */
        public function beforeFilter() {

                $cfg = Configure::read('Eshop');
                $shippings = explode(',', $cfg['shipping']);
                $shippings = array_combine($shippings, $shippings);
                $payements = explode(',', $cfg['payement']);
                $payements = array_combine($payements, $payements);
                $this->set(compact('shippings', 'payements'));

                $this->Security->validatePost = false;

                 parent::beforeFilter();

        }

        /**
         * Add order
         *
         * @return void
         */
        public function add() {

                $items = $this->Session->read("Eshop.items");
                $last_page = $this->Session->read("Eshop.last_page");

                if (empty($items)) {
                        $this->Session->setFlash(__('No items for create order', true), 'default', array('class' => 'error'));
                        $this->redirect($last_page);
                }

                if (!empty($this->data)) {
                        $this->EshopOrder->create();
                        $this->data['EshopOrder']['items'] = serialize($this->Session->read('Eshop.items'));
                        if ($this->EshopOrder->save($this->data)) {

                                $this->Email->from = Configure::read('Site.title') . ' '
                                        . '<eshop@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
                                $this->Email->to = $this->data['EshopOrder']['contact_email'];
                                $this->Email->bcc = array(Configure::read('Eshop.email'));
                                $this->Email->subject = '[' . Configure::read('Site.title') . '] ' . __('New order', true);
                                $this->Email->template = 'confirm_order';
                                $this->Email->sendAs = 'html';
                                $this->set('items', $this->EshopItem->findCalculatedBasketItems($items));
                                $this->set('order_id', $this->EshopOrder->id);
                                $this->Email->send();

                                $this->Session->delete('Eshop');
                                $this->Session->setFlash(__('Your order was succesfully sended. Check confirmation email in your mailbox', true), 'default', array('class' => 'success'));
                                $this->redirect($last_page);
                        }
                        $this->Session->setFlash(__('Error during order saving', true), 'default', array('class' => 'error'));
                }

                $this->set(compact('last_page'));

        }

}
?>
