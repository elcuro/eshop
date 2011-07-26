<div class="basket-summary">
<?php
if ($basket_summary['Sums']['sum_without_vat'] > 0) {
        echo $html->link(__d( 'eshop', 'In Basket', true).' = '.$number->currency($basket_summary['Sums']['sum_with_vat'], 'EUR'),
                array('plugin' => 'eshop', 'controller' => 'eshop_basket', 'action' => 'view'), array('escape' => false));
} else {
        __d( 'eshop', 'Basket is empty');
}
?>
</div>