<?php
/**
* Eshop behavior
*
* @author Juraj Jancuska <jjancuska@gmail.com>
* @copyright (c) 2010 Juraj Jancuska
* @license MIT License - http://www.opensource.org/licenses/mit-license.php
*/
class EshopBehavior extends ModelBehavior {

        /**
         * Item object
         *
         * @var object
         */
        private $Item = null;

        /**
         * Setup
         *
         * @param object $model
         * @param array  $config
         * @return void
         */
        public function setup(&$model, $config = array()) {
                if (is_string($config)) {
                        $config = array($config);
                }

                $this->settings[$model->alias] = $config;
        }

        /**
         * After find callback
         *
         * @param object $model
         * @param array $results
         * @param boolean $primary
         * @return array
         */
         public function  afterFind(&$model, $results, $primary) {
                parent::afterFind($model, $results, $primary);

                if ($primary && isset($results[0][$model->alias]['id']) && isset($results[0][$model->alias]['type'])) {
                    foreach ($results AS $i => $result) {
                        if ($results[$i][$model->alias]['type'] == 'product') {
                            $results[$i]['EshopItems'] = $this->_getItems($model, $result[$model->alias]['id']);
                        }
                    }
                } elseif (isset($results[$model->alias])) {
                    if ($results[$model->alias]['type'] == 'product') {
                        $results['EshopItems'] = $this->_getItems($model, $results[$model->alias]['id']);
                    }
                }

                return $results;

        }

        /**
         * Get all attachments for node
         *
         * @param object $model
         * @param integer $nodeid
         * @return array
         */
        private function _getItems(&$model, $node_id) {

                if (!is_object($this->Item)) {
                        $this->Item = ClassRegistry::init('Eshop.EshopItem');
                }
                // unbind unnecessary models from EshopItem
                $this->Item->unbindModel(array(
                    'belongsTo' => array('EshopSupplier')
                ));
                $items = $this->Item->find('all', array(
                    'conditions' => array('EshopItem.node_id' => $node_id)
                ));
                
                return $items;

        }

        /**
         * After delete callback
         *
         * @param object $model
         * @return void
         */
        public function  aftereDelete(&$model) {
                parent::afterDelete($model);

                if (!is_object($this->Item)) {
                        $this->Item = ClassRegistry::init('Eshop.EshopItem');
                }

                $this->Item->deleteAll(array('node_id' => $node_id));
        }

}
?>