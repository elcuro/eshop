<?php
class EshopAppModel extends AppModel {

        /**
         * Validation messages put to the validation_errors.po
         * Must be localized manually, because i18 console don't now id of message
         *
         * @param array $var
         * @return array
         */
        public function invalidate($field, $value = true) {
                return parent::invalidate($field, __d('validation_errors', $value, true));
        }

}
?>