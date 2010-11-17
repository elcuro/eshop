<?php
class EshopAppController extends AppController {

        public $components    = array('Cookie');

        function beforeFilter() {
                $this->Cookie->time =  3600;
                parent::beforeFilter();
        }

}
?>